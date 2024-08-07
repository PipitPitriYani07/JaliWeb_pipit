<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PotonganHarga;

class PotonganHargaController extends Controller
{
    public function __construct()
    {
        $this->model= new PotonganHarga();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Katalog Potongan Harga',
            'jenis'     => DB::table('jenis_promo')->get()
        ];

        return view('potonganharga.index', $data);
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
                    $btn .= '<a href="' . url('potongan-harga/detail/' . base64_encode($row->id_promo)) . '" class="dropdown-item"> Detail Promosi</a>';
                    $btn .= '<a href="' . url('potongan-harga/form/' . base64_encode($row->id_promo)) . '" class="dropdown-item"> Ubah</a>';
                    if ($row->status == '1') {
                        $btn .= '<button type="button" class="dropdown-item" onclick="nonAktif(' . $row->id_promo . ')"> Non Aktifkan</button>';
                    }
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<a href="' . url('potongan-harga/delete/' . base64_encode($row->id_promo)) . '" class="dropdown-item"> Hapus</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('tanggal', function ($row) {
                    $indotime = new IndoTime();

                    $tanggal_awal = $row->tanggal_mulai ? $indotime->convertDateTime($row->tanggal_mulai, 3) . ' WIB' : '-';
                    $tanggal_selesai = $row->tanggal_selesai ? $indotime->convertDateTime($row->tanggal_selesai, 3) . ' WIB' : '-';

                    return $tanggal_awal . ' - ' . $tanggal_selesai;
                })
                ->addColumn('status_aktif', function ($row) {
                    switch ($row->status) {
                        case '0':
                            $status_aktif = '<span class="badge bg-danger">Tidak Aktif</span>';
                            break;
                        case '1':
                            $status_aktif = '<span class="badge bg-success">Aktif</span>';
                            break;
                        default:
                            $status_aktif = '';
                            break;
                    }

                    return $status_aktif;
                })
                ->addColumn('nilai_promo', function ($row) {
                    if ($row->id_jenis_promo == '01' || $row->id_jenis_promo == '03') {
                        return $row->nilai . '%';
                    } else {
                        return 'Rp. ' . number_format($row->nilai,0,',','.');
                    }
                })
                ->rawColumns(['action', 'status_aktif', 'tanggal', 'nilai_promo'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $data = [
            'title' => 'Form Potongan Harga',
            'jenis_promo' => DB::table('jenis_promo')->get(),
            'data' => $this->model->find(base64_decode($id))
        ];

        return view('potonganharga.form', $data);
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
                $image->move('public/promo', $nama);
            }

            $validate['kode_promo']       = $request->get('kode_promo');
            $validate['judul_promo']      = $request->get('judul_promo');
            $validate['penjelasan']       = $request->get('penjelasan');
            $validate['tanggal_mulai']    = $request->get('tanggal_mulai');
            $validate['tanggal_selesai']  = $request->get('tanggal_selesai');
            $validate['nilai']            = $request->get('nilai');
            $validate['status']           = $request->get('status');
            $validate['kuota']            = $request->get('kuota');
            $validate['sisa_kuota']       = $request->get('sisa_kuota');
            $validate['id_jenis_promo']   = $request->get('id_jenis_promo');
            $validate['gambar']           = $nama;

            $this->model->create($validate);
            return redirect('potongan-harga')->with('success', 'Berhasil simpan');
        } else {
            $cek = DB::table('promo')->where('id_promo', $id)->first();

            $image = $request->file('gambar');
            if ($image == null || $image->getError() !== UPLOAD_ERR_OK) {
                if ($cek->gambar != null) {
                    $nama = $request->get('gambar_lama');
                } else {
                    $nama = '';
                }
            } else {
                $nama = $image->hashName();
                $image->move('public/promo', $nama);
                if (file_exists('public/promo/' . $cek->gambar) && $cek->gambar != null) {
                    unlink('public/promo/' . $cek->gambar);
                }
            }

            $validate['kode_promo']       = $request->get('kode_promo');
            $validate['judul_promo']      = $request->get('judul_promo');
            $validate['penjelasan']       = $request->get('penjelasan');
            $validate['tanggal_mulai']    = $request->get('tanggal_mulai');
            $validate['tanggal_selesai']  = $request->get('tanggal_selesai');
            $validate['nilai']            = $request->get('nilai');
            $validate['status']           = $request->get('status');
            $validate['kuota']            = $request->get('kuota');
            $validate['sisa_kuota']       = $request->get('sisa_kuota');
            $validate['id_jenis_promo']   = $request->get('id_jenis_promo');
            $validate['gambar']           = $nama;

            $this->model->where('id_promo', $id)->update($validate);

            return redirect('potongan-harga')->with('success', 'Berhasil perbarui');
        }
    }

    public function destroy(Request $request, $id = null)
    {
        $this->model->destroy(base64_decode($id));
        return redirect('potongan-harga')->with('success', 'Berhasil dihapus');
    }

    public function nonaktif(Request $request)
    {
        $this->model->where('id_promo', $request->get('id'))->update(['status' => '0']);
        return response()->json(['status' => 'oke']);
    }

    public function detail(String $id)
    {
        $data = [
            'title' => 'Detail Potongan Harga',
            'data' => $this->model->find(base64_decode($id))
        ];

        return view('potonganharga.detail', $data);
    }
}
