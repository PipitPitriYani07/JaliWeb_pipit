<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Banner;

class BannerController extends Controller
{
  public function __construct()
    {
        $this->model= new Banner();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Banner',
            'posisi'    => DB::table('posisi_banner')->get()
        ];

        return view('banner.index', $data);
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
                    $btn .= '<a href="' . url('banner') . '" class="dropdown-item"> Detail Promosi</a>';
                    $btn .= '<a href="' . url('banner/form/' . base64_encode($row->id_banner)) . '" class="dropdown-item"> Ubah</a>';
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapus(' . $row->id_banner . ')"> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('gambar_banner', function ($row) {
                    $gambar = '<img src="' . url('public/banner/') . '/' . $row->gambar . '" class="img-thumbnail" width="100%"/>';

                    return $gambar;
                })
                ->addColumn('waktudibuat', function ($row) {
                    $indotime = new IndoTime();

                    $waktu = $row->waktu_dibuat ? $indotime->convertDateTime($row->waktu_dibuat, 3) . ' WIB' : '-';

                    return $waktu;
                })
                ->addColumn('dibuatoleh', function ($row) {
                    return $row->id_pengguna ? DB::table('pengguna')->where('id_pengguna', $row->id_pengguna)->first('nama_lengkap')->nama_lengkap : '-';
                })
                ->addColumn('posisi', function ($row) {
                    return $row->id_posisi_banner ? DB::table('posisi_banner')->where('id_posisi_banner', $row->id_posisi_banner)->first('posisi')->posisi : '-';
                })
                ->rawColumns(['action', 'gambar_banner', 'waktudibuat', 'dibuatoleh', 'posisi'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $data = [
            'title'     => 'Form Banner',
            'posisi'    => DB::table('posisi_banner')->get(),
            'data'      => $this->model->find(base64_decode($id))
        ];

        return view('banner.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        if ($id == null) {
            $image = $request->file('gambar');

            if ($image == null) {
                $nama = '';
            } else {
                $nama = $image->hashName();
                $image->move('public/banner', $nama);
            }

            $validate['judul']              = $request->get('judul');
            $validate['waktu_dibuat']       = date('Y-m-d H:i:s');
            $validate['waktu_diperbaharui'] = date('Y-m-d H:i:s');
            $validate['konten']             = $request->get('konten');
            $validate['id_posisi_banner']   = $request->get('id_posisi_banner');
            $validate['id_pengguna']        = session()->get('id_pengguna');
            $validate['gambar']             = $nama;

            $this->model->create($validate);
            return redirect('banner')->with('success', 'Berhasil simpan');
        } else {
            $cek = DB::table('banner')->where('id_banner', $id)->first();

            $image = $request->file('gambar');
            if ($image == null || $image->getError() !== UPLOAD_ERR_OK) {
                if ($cek->gambar != null) {
                    $nama = $request->get('gambar_lama');
                } else {
                    $nama = '';
                }
            } else {
                $nama = $image->hashName();
                $image->move('public/banner', $nama);
                if (file_exists('public/banner/' . $cek->gambar) && $cek->gambar != null) {
                    unlink('public/banner/' . $cek->gambar);
                }
            }

            $validate['judul']              = $request->get('judul');
            $validate['waktu_diperbaharui'] = date('Y-m-d H:i:s');
            $validate['konten']             = $request->get('konten');
            $validate['id_posisi_banner']   = $request->get('id_posisi_banner');
            $validate['id_pengguna']        = session()->get('id_pengguna');
            $validate['gambar']             = $nama;

            $this->model->where('id_banner', $id)->update($validate);

            return redirect('banner')->with('success', 'Berhasil perbarui');
        }
    }

    public function destroy(Request $request)
    {
        $this->model->where('id_banner', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }
}
