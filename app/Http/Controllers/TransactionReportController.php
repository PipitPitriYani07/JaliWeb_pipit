<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TransactionReportController extends Controller
{
    private Transaksi $model;

    public function __construct()
    {
        $this->model = new Transaksi();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Transaksi'
        ];

        return view('transactionreport.index', $data);
    }

    public function lihatLaporan($tgl_mulai, $tgl_selesai)
    {
        $startdate = Carbon::parse($tgl_mulai)->startOfDay();
        $enddate = Carbon::parse($tgl_selesai)->endOfDay();

        $dataTransaksi = DB::table('transaksi')
            ->where('id_status_transaksi', '25')
            ->whereBetween('waktu_pemesanan', [$startdate, $enddate]);

        $data = [
            'title' => 'Lihat Laporan Harian',
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'total_penjualan' => $dataTransaksi->sum('sub_total_harga'),
            'jumlah_transaksi' => $dataTransaksi->count(),
            'pendapatan_bersih' => $dataTransaksi->where('id_status_transaksi', '25')->sum('penghasilan_bersih'),
            'jumlah_hari' => $enddate->diffInDays($startdate) + 1
        ];

        return view('transactionreport.lihatlaporan', $data);
    }

    public function lihatLaporanBulanan($bulan, $tahun)
    {
        $tgl = $tahun . '-' . $bulan;

        $tgl_awal = Carbon::parse($tgl)->startOfMonth();
        $tgl_akhir = Carbon::parse($tgl)->endOfMonth();

        $dataTransaksi = DB::table('transaksi')
            ->where('id_status_transaksi', '25')
            ->whereBetween('waktu_pemesanan', [$tgl_awal, $tgl_akhir]);

        $data = [
            'title' => 'Lihat Laporan Harian',
            'tgl_mulai' => $tgl_awal,
            'tgl_selesai' => $tgl_akhir,
            'total_penjualan' => $dataTransaksi->sum('sub_total_harga'),
            'jumlah_transaksi' => $dataTransaksi->count(),
            'pendapatan_bersih' => $dataTransaksi->where('id_status_transaksi', '25')->sum('penghasilan_bersih'),
            'jumlah_hari' => $tgl_akhir->diffInDays($tgl_awal) + 1
        ];

        return view('transactionreport.lihatlaporan', $data);
    }
}
