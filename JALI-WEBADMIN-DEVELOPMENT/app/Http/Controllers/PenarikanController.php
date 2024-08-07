<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Penarikan;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PenarikanController extends Controller
{
    public function __construct()
    {
        $this->model= new Penarikan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Penarikan',
            'status'    => DB::table('status_transaksi')
                ->whereIn('id_status_transaksi', ['13', '23', '25'])
                ->get()
        ];

        return view('penarikan.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('penarikan/detail/' . base64_encode($row->id_penarikan)) . '" class="dropdown-item"> Detail Transaksi</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('waktu_permintaan', function ($row) {
                    $indotime = new IndoTime();
                    return $row->waktu_permintaan ? $indotime->convertDateTime($row->waktu_permintaan, 3) . ' WIB' : '-';
                })
                ->addColumn('pengguna', function ($row) {
                    return $row->id_pengguna ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna)->first('nama_lengkap')->nama_lengkap : '-';
                })
                ->addColumn('nominal', function ($row) {
                    return 'Rp. ' . number_format($row->nominal, 0, ',', '.');
                })
                ->addColumn('status', function ($row) {
                    switch ($row->id_status_transaksi) {
                        case '00':
                            $status = '<span class="badge bg-secondary">Keranjang</span>';
                            break;
                        case '10':
                            $status = '<span class="badge bg-secondary">Mencari Driver</span>';
                            break;
                        case '11':
                            $status = '<span class="badge bg-info">Mitra Menuju Tempatmu</span>';
                            break;
                        case '12':
                            $status = '<span class="badge bg-warning">Menunggu Pembayaran</span>';
                            break;
                        case '13':
                            $status = '<span class="badge bg-primary">Menunggu Verifikasi</span>';
                            break;
                        case '21':
                            $status = '<span class="badge bg-danger">Dibatalkan Konsumen</span>';
                            break;
                        case '22':
                            $status = '<span class="badge bg-danger">Dibatalkan Mitra</span>';
                            break;
                        case '23':
                            $status = '<span class="badge bg-danger">Dibatalkan Sistem</span>';
                            break;
                        case '24':
                            $status = '<span class="badge bg-success">Topup Selesai</span>';
                            break;
                        case '25':
                            $status = '<span class="badge bg-success">Transaksi Selesai</span>';
                            break;
                        default:
                            $status = '';
                            break;
                    }
                    return $status;
                })
                ->rawColumns(['action', 'waktu_permintaan', 'pengguna', 'nominal', 'status'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Penarikan',
            'data' => $this->model->find(base64_decode($id)),
            'status_penarikan' => DB::table('status_transaksi')->get()
        ];

        return view('penarikan.detail', $data);
    }

    public function checkPassword(Request $request)
    {
        $pengguna = Pengguna::where('alamat_email', session('alamat_email'))->first();

        if (!password_verify($request->password, $pengguna['kata_kunci'])) {
            return response()->json(['status' => false], 401);
        }
        return response()->json(['status' => true], 200);
    }

    public function ubahStatus(Request $request)
    {
        if ($request->status == '23' || $request->status == '24' || $request->status == '25') {
            $this->model->where('id_penarikan', $request->id)->update([
                'id_status_transaksi' => $request->status,
                'id_pengguna_verifikator' => session('id_pengguna'),
                'waktu_selesai' => date('Y-m-d H:i:s')
            ]);
        } else {
            $this->model->where('id_penarikan', $request->id)->update(['id_status_transaksi' => $request->status]);
        }

        return response()->json(['status' => true], 200);
    }

    public function verifikasi(Request $request)
    {
        $data = $this->model->find($request->id);
        $saldo = DB::table('saldo')->where('id_pengguna', $data['id_pengguna'])->first();

        if ($saldo->nominal > $data['nominal']) {
            if ($this->model->where('id_penarikan', $request->id)->update([
                'id_status_transaksi' => '25',
                'id_pengguna_verifikator' => session('id_pengguna'),
                'waktu_selesai' => date('Y-m-d H:i:s')
            ])) {
                $dataSaldo = [
                    'nominal' => $saldo->nominal - $data['nominal'],
                    'waktu_perubahan' => date('Y-m-d H:i:s'),
                    'catatan_perubahan' => 'Penarikan Saldo'
                ];

                $riwayatSaldo = [
                    'nominal' => $data['nominal'],
                    'sisa_saldo' => $dataSaldo['nominal'],
                    'waktu_perubahan' => date('Y-m-d H:i:s'),
                    'jenis_transaksi' => 'keluar',
                    'catatan_transaksi' => 'Penarikan Saldo',
                    'id_saldo' => $saldo->id_saldo,
                    'id_pengguna_pelaku' => session('id_pengguna')
                ];

                DB::table('saldo')->where('id_saldo', $saldo->id_saldo)->update($dataSaldo);
                DB::table('riwayat_saldo')->insert($riwayatSaldo);
                $user = DB::table('pengguna')
                    ->where('id_pengguna', $data['id_pengguna'])
                    ->first();
                Http::withHeaders([
                    'Authorization' => 'key=' . config('services.firebase.cloud_messaging_server_key'),
                    'Content-Type'  => 'application/json',
                ])->post('https://fcm.googleapis.com/fcm/send', [
                    'to'            => $user->firebase_id_token,
                    'notification'  => [
                        'title'     => "Info Penarikan",
                        'body'      => "Penarikan dana berhasil",
                        'priority'  => 'high'
                    ],
                ]);

                return response()->json(['status' => true], 200);
            } else {
                return response()->json(['status' => false], 400);
            }
        } else {
            $this->model->where('id_penarikan', $request->id)->update([
                'id_status_transaksi' => '23',
                'id_pengguna_verifikator' => session('id_pengguna'),
                'waktu_selesai' => date('Y-m-d H:i:s')
            ]);
            return response()->json(['status' => false], 401);
        }
    }

    public function tolak(Request $request)
    {
        $data = $this->model->find($request->id);

        if ($this->model->where('id_penarikan', $request->id)->update([
            'id_status_transaksi' => '23',
            'id_pengguna_verifikator' => session('id_pengguna'),
            'waktu_selesai' => date('Y-m-d H:i:s')
        ])) {

            $user = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna'])->first();
            Http::withHeaders([
                'Authorization' => 'key=' . config('services.firebase.cloud_messaging_server_key'),
                'Content-Type'  => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', [
                'to'            => $user->firebase_id_token,
                'notification'  => [
                    'title'     => "Info Penarikan",
                    'body'      => "Penarikan dana ditolak",
                    'priority'  => 'high'
                ],
            ]);

            return response()->json(['status' => true], 200);
        } else {
            return response()->json(['status' => false], 400);
        }
    }
}
