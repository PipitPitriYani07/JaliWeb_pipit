<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Pengguna;
use App\Models\TopUp;
use App\Models\RiwayatTopupSaldo;
use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TopUpController extends Controller
{
    public $model;
    public $pengguna;
    public $riwayat;
    private Saldo $saldo;

    public function __construct()
    {
        $this->model = new TopUp();
        $this->pengguna = new Pengguna();
        $this->riwayat = new RiwayatTopupSaldo();
        $this->saldo = new Saldo();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Transaksi Top Up',
            'status'    => DB::table('status_transaksi')
                ->whereIn('id_status_transaksi', ['00', '12', '13', '21', '23', '24'])
                ->get()
        ];

        return view('topup.index', $data);
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
                    $btn .= '<a href="' . url('topup/detail/' . base64_encode($row->id_topup_saldo)) . '" class="dropdown-item"> Detail Transaksi</a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('pengguna', function ($row) {
                    $nama_pengguna = $row->id_pengguna ? Pengguna::where('id_pengguna', $row->id_pengguna)->first()->nama_lengkap : '-';

                    return $nama_pengguna;
                })
                ->addColumn('tanggal', function ($row) {
                    $indotime = new IndoTime();

                    $waktu_permintaan = $row->waktu_permintaan ? $indotime->convertDateTime($row->waktu_permintaan, 3) . ' WIB' : '-';
                    $waktu_selesai = $row->waktu_selesai ? $indotime->convertDateTime($row->waktu_selesai, 3) . ' WIB' : '-';

                    return $waktu_permintaan . ' - ' . $waktu_selesai;
                })
                ->addColumn('status_aktif', function ($row) {
                    $status_aktif = '';
                    switch ($row->id_status_transaksi) {
                        case '00':
                            $status_aktif = '<span class="badge bg-warning">Belum Verifikasi</span>';
                            break;
                        case '24':
                            $status_aktif = '<span class="badge bg-success">Topup Selesai</span>';
                            break;
                        case '23':
                            $status_aktif = '<span class="badge bg-danger">Topup Ditolak</span>';
                            break;
                        case '12':
                            $status_aktif = '<span class="badge bg-secondary">Menunggu Pembayaran</span>';
                            break;
                        case '13':
                            $status_aktif = '<span class="badge bg-secondary">Menuggu Verifikasi</span>';
                            break;
                        default:
                            $status_aktif = '';
                            break;
                    }

                    return $status_aktif;
                })
                ->addColumn('nominal', function ($row) {
                    $nominal = 'Rp ' . number_format($row->nominal,0,',','.');

                    return $nominal;
                })
                ->rawColumns(['action', 'status_aktif', 'tanggal', 'nilai_promo'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function detail(String $id)
    {
        $topup = DB::table('topup_saldo')->where('id_topup_saldo', base64_decode($id))->first();
        // dd($topup);
        $data = [
            'title'     => 'Detail Top Up',
            'data'    => $topup,
            'pengguna' => $this->pengguna->where('id_pengguna', $topup->id_pengguna)->first()->nama_lengkap,
            'verifikasi' => $this->pengguna->where('id_pengguna', $topup->id_pengguna_verifikator)->first()->nama_lengkap ?? '-'
        ];

        // dd($data['data']);

        return view('topup.detail', $data);
    }

    public function konfirmasi (String $segment, $id)
    {
        $status_transaksi = $segment == 'terima' ? '24' : '23';
        $catatan = $segment == 'terima' ? 'diterima' : 'ditolak';

        $data = [
            'id_pengguna_verifikator' => session()->get('id_pengguna'),
            'id_status_transaksi'     => $status_transaksi,
            'waktu_selesai'           => date('Y-m-d H:i:s')
        ];

        $this->model->where('id_topup_saldo', $id)->update($data);

        $datariwayat = [
            'waktu_perubahan'       => date('Y-m-d H:i:s'),
            'catatan'               => $catatan . ' Oleh Admin',
            'id_topup_saldo'        => $id,
            'id_status_transaksi'   => $status_transaksi,
            'id_pengguna_pengubah'  => session()->get('id_pengguna')
        ];

        DB::table('riwayat_topup_saldo')->insert($datariwayat);

        $topupsaldo = DB::table('topup_saldo')->where('id_topup_saldo', $id)->first();
        if ($segment == 'terima') {
            $cek = DB::table('saldo')->where('id_pengguna', $topupsaldo->id_pengguna)->first();

            // dd(topupsaldo);

            if ($cek == null) {
                $validate['waktu_perubahan']    = date('Y-m-d H:i:s');
                $validate['nominal']            = $topupsaldo->nominal;
                $validate['catatan_perubahan']  = $datariwayat['catatan'];
                $validate['id_pengguna']        = $topupsaldo->id_pengguna;

                // dd($validate);

                $idSaldo = $this->saldo->create($validate);

                $dataSaldo = [
                    'nominal'               => $topupsaldo->nominal,
                    'sisa_saldo'            => $topupsaldo->nominal,
                    'waktu_perubahan'       => date('Y-m-d H:i:s'),
                    'jenis_transaksi'       => 'masuk',
                    'catatan_transaksi'     => $datariwayat['catatan'],
                    'id_saldo'              => $idSaldo['id_saldo'],
                    'id_pengguna_pelaku'    => session()->get('id_pengguna')
                ];

                DB::table('riwayat_saldo')->insert($dataSaldo);
            } else {
                $validate['waktu_perubahan']    = date('Y-m-d H:i:s');
                $validate['nominal']            = $cek->nominal + $topupsaldo->nominal;
                $validate['catatan_perubahan']  = $datariwayat['catatan'];
                $validate['id_pengguna']        = $topupsaldo->id_pengguna;

                $this->saldo->where('id_saldo', $cek->id_saldo)->update($validate);

                $dataSaldo = [
                    'nominal'               => $topupsaldo->nominal,
                    'sisa_saldo'            => $cek->nominal + $topupsaldo->nominal,
                    'waktu_perubahan'       => date('Y-m-d H:i:s'),
                    'jenis_transaksi'       => 'masuk',
                    'catatan_transaksi'     => $datariwayat['catatan'],
                    'id_saldo'              => $cek->id_saldo,
                    'id_pengguna_pelaku'    => session()->get('id_pengguna')
                ];

                DB::table('riwayat_saldo')->insert($dataSaldo);
            }
        }

        $user = DB::table('pengguna')
            ->where('id_pengguna', $topupsaldo->id_pengguna)
            ->first();

        Http::withHeaders([
            'Authorization' => 'key=' . config('services.firebase.cloud_messaging_server_key'),
            'Content-Type'  => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', [
            'to'            => $user->firebase_id_token,
            'notification'  => [
                'title'     => "Info Top Up",
                'body'      => $segment == 'terima' ? "Top up berhasil, silahkan cek aplikasi" : "Top up ditolak",
                'priority'  => 'high'
            ]
        ]);

        return redirect('topup/detail/' . base64_encode($id))->with('success', 'Berhasil memperbarui status');
    }

    public function riwayat(String $id)
    {
        $data = [
            'title' => 'Riwayat Topup',
            'id_topup'    => base64_decode($id)
        ];

        return view('topup/riwayat', $data);
    }

    public function listDataRiwayat(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->riwayat->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('penggunapengubah', function ($row) {
                    $nama_pengguna = Pengguna::where('id_pengguna', $row->id_pengguna_pengubah)->first()->nama_lengkap;

                    return $nama_pengguna;
                })
                ->addColumn('waktuperubahan', function ($row) {
                    $indotime = new IndoTime();

                    $waktu_perubahan = $row->waktu_perubahan ? $indotime->convertDateTime($row->waktu_perubahan, 3) . ' WIB' : '-';

                    return $waktu_perubahan;
                })
                ->addColumn('status', function ($row) {
                    $status = '';
                    switch ($row->id_status_transaksi) {
                        case '00':
                            $status = '<span class="badge bg-warning">Belum Verifikasi</span>';
                            break;
                        case '24':
                            $status = '<span class="badge bg-success">Topup Selesai</span>';
                            break;
                        case '23':
                            $status = '<span class="badge bg-danger">Topup Ditolak</span>';
                            break;
                        case '12':
                            $status = '<span class="badge bg-secondary">Menunggu Pembayaran</span>';
                            break;
                        case '13':
                            $status = '<span class="badge bg-secondary">Menuggu Verifikasi</span>';
                            break;
                        default:
                            $status = '';
                            break;
                    }

                    return $status;
                })
                ->rawColumns(['status', 'penggunapengubah', 'waktuperubahan'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
