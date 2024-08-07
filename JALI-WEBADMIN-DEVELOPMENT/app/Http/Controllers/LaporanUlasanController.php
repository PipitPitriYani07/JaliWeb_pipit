<?php

namespace App\Http\Controllers;

use App\Models\LaporanUlasan;
use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LaporanUlasanController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new LaporanUlasan();
    }

    public function index()
    {
        return view('laporanulasan.index', [
            'title' => 'Laporan Ulasan'
        ]);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('waktu_ulasan', function ($row) {
                    $indotime = new IndoTime();
                    return $row->waktu_ulasan ? $indotime->convertDateTime($row->waktu_ulasan, 3) : '-';
                })
                ->addColumn('nilai_bintang', function ($row) {
                    $nilai = '<i class="fas fa-star" style="color: darkorange;"></i>' . $row->nilai_bintang;
                    return $nilai;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= 'Aksi <i class="fas fa-caret-down"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="'. url("laporan-ulasan/detail/" . base64_encode($row->id_ulasan)) .'" class="dropdown-item"><i class="fas fa-user"></i> Detail</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'nilai_bintang'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function detail(String $id)
    {
        $ulasan = $this->model->find(base64_decode($id));
        $data = [
            'title' => 'Detail Ulasan',
            'data' => $ulasan,
            'transaksi' => DB::table('transaksi')->where('id_transaksi', $ulasan['id_transaksi'])->first()
        ];

        return view('laporanulasan.detail', $data);
    }
}
