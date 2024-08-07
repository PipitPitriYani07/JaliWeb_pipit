<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->model= new Transaksi();
        $this->pengguna= new Pengguna();
    }

    public function index()
    {
        $bulan = array();
        // $datatransaksi = array();
        for ($i = 1; $i <= 12; $i++) {
            $bulan[$i] = str_pad($i, 2, '0', STR_PAD_LEFT);

            $layanan_mot[$i] = DB::table('transaksi')
                ->whereRaw('MONTH(waktu_pemesanan) = ?', [$bulan[$i]])
                ->whereRaw('YEAR(waktu_pemesanan) = ?', date('Y'))
                ->where('id_layanan', '1')
                ->count();

            $layanan_mob[$i] = DB::table('transaksi')
                ->whereRaw('MONTH(waktu_pemesanan) = ?', [$bulan[$i]])
                ->whereRaw('YEAR(waktu_pemesanan) = ?', date('Y'))
                ->where('id_layanan', '2')
                ->count();

            $layanan_kur[$i] = DB::table('transaksi')
                ->whereRaw('MONTH(waktu_pemesanan) = ?', [$bulan[$i]])
                ->whereRaw('YEAR(waktu_pemesanan) = ?', date('Y'))
                ->where('id_layanan', '3')
                ->count();

            $layanan_mam[$i] = DB::table('transaksi')
                ->whereRaw('MONTH(waktu_pemesanan) = ?', [$bulan[$i]])
                ->whereRaw('YEAR(waktu_pemesanan) = ?', date('Y'))
                ->where('id_layanan', '4')
                ->count();
        }

        $data = [
            'title'           => 'Dashboard',
            'total_pengguna'  => Pengguna::count(),
            'total_pesanan'   => Transaksi::whereDate('waktu_pemesanan', today())->count(),
            'pengguna_aktif'  => DB::table('pengguna')->where('terakhir_login', '>=', now()->subDay())->count(),
            'pengguna_minggu' => DB::table('pengguna')->whereBetween('waktu_daftar', [Carbon::parse(now()->subWeek())->startOfDay(), Carbon::parse(now())->endOfDay()])->count(),
            'jml_pesanan'     => Transaksi::count(),
            'total_bersih'    => Transaksi::sum('penghasilan_bersih'),
            'total_kotor'     => Transaksi::sum('total_harga'),
            'layanan_mot'     => implode(', ', $layanan_mot),
            'layanan_mob'     => implode(', ', $layanan_mob),
            'layanan_kur'     => implode(', ', $layanan_kur),
            'layanan_mam'     => implode(', ', $layanan_mam),
            'total_mot'       => Transaksi::where('id_layanan', '1')->count(),
            'total_mob'       => Transaksi::where('id_layanan', '2')->count(),
            'total_kur'       => Transaksi::where('id_layanan', '3')->count(),
            'total_mam'       => Transaksi::where('id_layanan', '4')->count()
        ];

        // dd($data['layanan_mot']);

        return view('dashboard.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatablesForDashboard($request);
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
                ->addColumn('pemesan', function ($row) {
                    return $row->id_pengguna_pemesan ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna_pemesan)->first('nama_lengkap')->nama_lengkap : '-';
                })
                ->addColumn('mitra', function ($row) {
                    return $row->id_pengguna_mitra ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna_mitra)->first('nama_lengkap')->nama_lengkap : '-';
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
                ->addColumn('waktu_pesanan', function ($row) {
                    $indotime = new IndoTime();
                    return $row->waktu_pemesanan ? $indotime->convertDateTime($row->waktu_pemesanan, 2) : '-';
                })
                ->rawColumns(['action', 'pemesan', 'mitra', 'status', 'layanan', 'waktu_pesanan'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
