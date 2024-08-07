<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\JenisKendaraan;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->model= new JenisKendaraan();
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis Kendaraan',
            'WEB_USER'  => 'https://priludestudio.com/jali/webuser/'
        ];
        return view('kendaraan.index', $data);
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
                    $btn .= '<a style="cursor: pointer" onclick="ubah(' . $row->id_jenis_kendaraan . ')" title="Edit Jenis Kendaraan" class="dropdown-item">Ubah</a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('icon', function ($row) {
                    $ikon = $row->ikon != '-' ? '<img src="https://priludestudio.com/jali/webuser/public/ikonjeniskendaraan/'. $row->ikon .'" class="img-thumbnail" width="100%"/>' : '-';

                    return $ikon;
                })
                ->addColumn('keterangan', function ($row) {
                    $keterangan = $row->keterangan ? $row->keterangan : '-';

                    return $keterangan;
                })
                ->addColumn('beratmaksimal', function ($row) {
                    $berat = $row->berat_maksimal ? $row->berat_maksimal. ' Kg' : '-';

                    return $berat;
                })
                ->rawColumns(['action', 'icon', 'keterangan', 'beratmaksimal'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function reqData($id)
    {
        $q = $this->model->find($id);
        echo json_encode($q);
    }

    public function saveJenisKendaraan(Request $request)
    {
        $id = $request->get('id');

        if ($id) {
            $validate['jenis_kendaraan']    = $request->get('jenis_kendaraan');
            $validate['keterangan']         = $request->get('keterangan');
            $validate['berat_maksimal']     = $request->get('berat_maksimal');

            if ($request->get('ikon_new')) {
                $validate['ikon']    = $request->get('ikon_new');
            }

            $this->model->where('id_jenis_kendaraan', $id)->update($validate);
            echo json_encode(['status' => 'update']);
        } else {
            $validate['ikon']               = $request->get('ikon_new');
            $validate['jenis_kendaraan']    = $request->get('jenis_kendaraan');
            $validate['keterangan']         = $request->get('keterangan');
            $validate['berat_maksimal']     = $request->get('berat_maksimal');

            $this->model->create($validate);
            echo json_encode(['status' => 'add']);
        }
    }
}
