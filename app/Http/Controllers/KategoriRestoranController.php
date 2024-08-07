<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\KategoriRestoran;

class KategoriRestoranController extends Controller
{
    private KategoriRestoran $model;
    private $urlImg;

    public function __construct()
    {
        $this->model = new KategoriRestoran();
        $this->urlImg = config('constant.web_user_url');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Kategori Restoran'
        ];

        return view('kategorirestoran.index', $data);
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
                    $btn .= '<a href="' . url('kategori-restoran/form/' . base64_encode($row->id_kategori_restoran)) . '" class="dropdown-item"> Ubah</a>';
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapus(' . $row->id_kategori_restoran . ')"> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('gambar', function ($row) {
                    $gambar = '<img src="' . $this->urlImg . '/' . $row->foto_kategori . '" class="img-thumbnail" width="100%"/>';
                    return $gambar;
                })
                ->rawColumns(['action', 'gambar'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $data = [
            'title'     => 'Form Kategori Restoran',
            'data'      => $this->model->find(base64_decode($id))
        ];

        return view('kategorirestoran.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        if ($id == null) {
            $validate['kategori_restoran']  = $request->get('kategori_restoran');
            $validate['foto_kategori']      = $request->nameImage ?? $request->gambar_lama;

            $this->model->create($validate);
            return redirect('kategori-restoran')->with('success', 'Berhasil simpan');
        } else {

            $validate['kategori_restoran']  = $request->get('kategori_restoran');
            $validate['foto_kategori']      = $request->nameImage ?? $request->gambar_lama;

            $this->model->where('id_kategori_restoran', $id)->update($validate);

            return redirect('kategori-restoran')->with('success', 'Berhasil perbarui');
        }
    }

    public function destroy(Request $request)
    {
        $this->model->where('id_kategori_restoran', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }
}
