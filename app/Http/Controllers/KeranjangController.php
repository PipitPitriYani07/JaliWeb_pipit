<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class KeranjangController extends Controller
{

    private Transaksi $model;
    public function __construct()
    {
        $this->model = new Transaksi();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Dalam Pemesanan',
            'total'     => Transaksi::count(),
            'harga'     => Transaksi::sum('total_harga'),
            'status'    => DB::table('status_transaksi')->get(),
            'layanan'   => DB::table('layanan')->get()
        ];

        return view('keranjang.index', $data);
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
                    $btn .= '<a href="' . url('pemesanan/detail/' . base64_encode($row->id_transaksi)) . '" class="dropdown-item"> Detail Transaksi</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('waktu_pesanan', function ($row) {
                    $indotime = new IndoTime();
                    return $row->waktu_pemesanan ? $indotime->convertDateTime($row->waktu_pemesanan, 3) . ' WIB' : '-';
                })
                ->addColumn('pemesan', function ($row) {
                    return $row->id_pengguna_pemesan ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna_pemesan)->first('nama_lengkap')->nama_lengkap : '-';
                })
                ->addColumn('mitra', function ($row) {
                    return $row->id_pengguna_mitra ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna_mitra)->first('nama_lengkap')->nama_lengkap : '-';
                })
                ->addColumn('total', function ($row) {
                    return 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
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
                        case '14':
                            $status = '<span class="badge bg-info">Dalam Perjalanan</span>';
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
                            $status = '<span class="badge bg-success">Selesai</span>';
                            break;
                        default:
                            $status = '';
                            break;
                    }
                    return $status;
                })
                ->addColumn('layanan', function ($row) {
                    return $row->id_layanan ? DB::table('layanan')->where('id_layanan', $row->id_layanan)->first('nama_layanan')->nama_layanan : '-';
                })
                ->rawColumns(['action', 'waktu_pesanan', 'pemesan', 'mitra', 'total', 'status', 'layanan'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function detail(String $id = null)
    {
        $transaksi = $this->model->find(base64_decode($id));
        $data = [
            'title'         => 'Detail Transaksi',
            'data'          => $transaksi,
            'id'            => base64_decode($id),
            'alamat_awal'   => DB::table('alamat_awal')->where('id_transaksi', base64_decode($id))->first(),
            'alamat_tujuan' => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->first(),
            'total_alamat'  => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->count(),
            'harga_tujuan'  => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->sum('harga'),
            'riwayat_transaksi' => $this->model->leftJoin('riwayat_transaksi', 'riwayat_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
                ->where('riwayat_transaksi.id_transaksi', base64_decode($id))
                ->get(),
            'status_transaksi'  => DB::table('status_transaksi')->orderBy('id_status_transaksi')->get()
        ];

        if ($transaksi['id_layanan'] == '4') {
            $data['menu_pertama'] = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->first();
            $data['rincian_menu'] = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->get();
            $data['total_menu']   = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->count();
            $data['harga_menu']   = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->sum('sub_total');
        }

        // dd($data);

        return view('keranjang.detail', $data);
    }

    public function destroy(String $id)
    {
        $this->model->destroy($id);
        return redirect('pemesanan')->with('success', 'Berhasil menghapus');
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
        if ($this->model->where('id_transaksi', $request->id)->update(['id_status_transaksi' => $request->status])) {
            DB::table('riwayat_transaksi')->insert([
                'waktu'               => date('Y-m-d H:i:s'),
                'id_status_transaksi' => $request->status,
                'id_transaksi'        => $request->id
            ]);
        }
        return response()->json(['status' => true], 200);
    }

    public function cetakNota(String $id)
    {
        $transaksi = $this->model->find(base64_decode($id));
        
        $data = [
            'title'         => 'Detail Transaksi',
            'data'          => $transaksi,
            'id'            => base64_decode($id),
            'alamat_awal'   => DB::table('alamat_awal')->where('id_transaksi', base64_decode($id))->first(),
            'alamat_tujuan' => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->first(),
            'total_alamat'  => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->count(),
            'harga_tujuan'  => DB::table('alamat_tujuan')->where('id_transaksi', base64_decode($id))->sum('harga'),
            'riwayat_transaksi' => $this->model->leftJoin('riwayat_transaksi', 'riwayat_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
                ->where('riwayat_transaksi.id_transaksi', base64_decode($id))
                ->get(),
            'status_transaksi'  => DB::table('status_transaksi')->orderBy('id_status_transaksi')->get()
        ];

        if ($transaksi['id_layanan'] == '4') {
            $data['menu_pertama'] = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->first();
            $data['rincian_menu'] = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->get();
            $data['total_menu']   = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->count();
            $data['harga_menu']   = DB::table('rincian_menu')->where('id_transaksi', base64_decode($id))->sum('sub_total');
        }

        $html = View::make('keranjang.printnota', $data)->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream('nota_' . $data['id'] . '.pdf');
    }
}
