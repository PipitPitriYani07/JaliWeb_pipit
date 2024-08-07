<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Restoran;
use App\Models\MenuRestoran;
use App\Models\KategoriMenu;
use App\Models\RestoranKategori;
use App\Models\Pengguna;

class RestoranController extends Controller
{
    private Restoran $model;
    private MenuRestoran $menu;

    public function __construct()
    {
        $this->model= new Restoran();
        $this->menu = new MenuRestoran();
        $this->kategori = new KategoriMenu();
        $this->kategoriRestoran = new RestoranKategori();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Restoran',
            'kota'      => DB::table('kota_layanan')
                ->join('kota', 'kota.id_kota', '=', 'kota_layanan.id_kota', 'left')
                ->get(),
            'status'    => DB::table('status_resto')
                ->get()
        ];

        // dd($data['kota']);

        return view('restoran.index', $data);
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
                    $btn .= '<a href="' . url('restoran/detail/' . base64_encode($row->id_restoran)) . '" class="dropdown-item"> Detail Restoran</a>';
                    $btn .= '<a href="' . url('restoran/form/' . base64_encode($row->id_restoran)) . '" class="dropdown-item"> Ubah</a>';
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapus(' . $row->id_restoran . ')"> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('foto', function ($row) {
                    $gambar = '<img src="' . url('public/restoran/') . '/' . $row->foto_restoran . '" class="img-thumbnail" width="100%"/>';

                    return $gambar;
                })
                ->addColumn('status_restoran', function ($row) {
                    return $row->id_status_restoran ? DB::table('status_resto')->where('id_status_resto', $row->id_status_restoran)->first('status')->status : '-';
                })
                ->addColumn('kota', function ($row) {
                    $layanan = DB::table('kota_layanan')
                        ->where('id_kota_layanan', $row->id_kota_layanan)
                        ->first();

                    return DB::table('kota')->where('id_kota', $layanan->id_kota)->first('nama_kota')->nama_kota;
                })
                ->addColumn('alamat', function ($row) {
                    if ($row->latitude != null && $row->longitude != null) {
                        $linkAlamat = '<a href="https://google.com/maps/place/' . $row->latitude . ',%20' . $row->longitude . '" target="_blank">'. $row->alamat .'</a>';
                    } else {
                        $linkAlamat = $row->alamat;
                    }

                    return $linkAlamat;
                })
                ->rawColumns(['action', 'foto', 'status_restoran', 'kota', 'alamat'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function form(String $id = null)
    {
        $kategori = array();
        foreach (DB::table('kategori_restoran_restoran')->where('id_restoran', base64_decode($id))->get() as $dataKategori) {
            $kategori[$dataKategori->id_kategori_restoran] = $dataKategori->id_kategori_restoran;
        }
        $data = [
            'title'     => 'Form Restoran',
            'kota'      => DB::table('kota_layanan')
                ->join('kota', 'kota.id_kota', '=', 'kota_layanan.id_kota', 'left')
                ->get(),
            'status'    => DB::table('status_resto')
                ->get(),
            'pemilik'   => DB::table('pengguna')
                ->get(),
            'data'      => $this->model->find(base64_decode($id)),
            'data_kategori' => $kategori,
            'kategori'      => DB::table('kategori_restoran')
            ->get()
        ];

        return view('restoran.form', $data);
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
                $image->move('public/restoran', $nama);
            }

            $validate['nama_restoran']        = $request->get('nama_restoran');
            $validate['waktu_ditambahkan']    = date('Y-m-d H:i:s');
            $validate['alamat']               = $request->get('alamat');
            $validate['longitude']            = $request->get('longitude');
            $validate['latitude']             = $request->get('latitude');
            $validate['id_status_restoran']   = $request->get('id_status_restoran');
            $validate['id_kota_layanan']      = $request->get('id_kota_layanan');
            $validate['foto_restoran']        = $nama;

            if (@$request->get('id_pengguna_pemilik')) {
                $validate['id_pengguna_pemilik']  = $request->get('id_pengguna_pemilik');
            }

            $idRestoran = $this->model->create($validate);

            $rst = $request->get('kategori');
            foreach ($rst as $id_kategori) {
                $data = [
                    'id_restoran'           => $idRestoran['id_restoran'],
                    'id_kategori_restoran'  => $id_kategori
                ];
                DB::table('kategori_restoran_restoran')->insert($data);
            }

            return redirect('restoran')->with('success', 'Berhasil simpan');
        } else {
            $cek = DB::table('restoran')->where('id_restoran', $id)->first();

            $image = $request->file('gambar');
            if ($image == null || $image->getError() !== UPLOAD_ERR_OK) {
                if ($cek->foto_restoran != null) {
                    $nama = $request->get('gambar_lama');
                } else {
                    $nama = '';
                }
            } else {
                $nama = $image->hashName();
                $image->move('public/restoran', $nama);
                if (file_exists('public/restoran/' . $cek->foto_restoran) && $cek->foto_restoran != null) {
                    unlink('public/restoran/' . $cek->foto_restoran);
                }
            }

            $validate['nama_restoran']        = $request->get('nama_restoran');
            $validate['waktu_ditambahkan']    = date('Y-m-d H:i:s');
            $validate['alamat']               = $request->get('alamat');
            $validate['longitude']            = $request->get('longitude');
            $validate['latitude']             = $request->get('latitude');
            $validate['id_status_restoran']   = $request->get('id_status_restoran');
            $validate['id_kota_layanan']      = $request->get('id_kota_layanan');
            $validate['foto_restoran']        = $nama;

            if (@$request->get('id_pengguna_pemilik')) {
                $validate['id_pengguna_pemilik']  = $request->get('id_pengguna_pemilik');
            }

            $this->model->where('id_restoran', $id)->update($validate);

            $kategoriLama = DB::table('kategori_restoran_restoran')->where('id_restoran', $id)->get();

            foreach ($kategoriLama as $id_restoran) {
                $this->kategoriRestoran->where('id_restoran', $id_restoran->id_restoran)->delete();
            }

            $rst = $request->get('kategori');
            foreach ($rst as $id_kategori_restoran) {
                $data = [
                    'id_restoran'           => $id,
                    'id_kategori_restoran'  => $id_kategori_restoran
                ];
                DB::table('kategori_restoran_restoran')->insert($data);
            }

            return redirect('restoran')->with('success', 'Berhasil perbarui');
        }
    }

    public function destroy(Request $request, $id = null)
    {
        if ($id) {
            $this->model->where('id_restoran', $id)->delete();
            return redirect('restoran')->with('success', 'Berhasil menghapus restoran');
        } else {
            $cek = DB::table('restoran')->where('id_restoran', $request->get('id'))->first();

            if (file_exists('public/restoran/' . $cek->foto_restoran) && $cek->foto_restoran != null) {
                unlink('public/restoran/' . $cek->foto_restoran);
            }

            $this->model->where('id_restoran', $request->get('id'))->delete();
            return response()->json(['status' => 'oke']);
        }
    }

    public function detail(String $id)
    {
        $data = [
            'title'     => 'Detail Restoran',
            'data'      => $this->model->find(base64_decode($id)),
            'kategori'  => DB::table('kategori_menu')->where('id_restoran', base64_decode($id))->get(),
            'WEB_USER'  => 'https://priludestudio.com/jali/webuser/',
            'jam_operasional' => DB::table('jam_operasional')->where('id_restoran', base64_decode($id))->get()
        ];

        return view('restoran.detail', $data);
    }

    public function tambah_jam_operasional(Request $request)
    {
        $rules = [
            'nomor_hari' => $request->hari,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'id_restoran' => $request->id_restoran,
        ];

        DB::table('jam_operasional')->insert($rules);

        return redirect()->back();
    }

    public function edit_jam_operasional(String $id)
    {
        return view('restoran.edit-jam', [
            'title' => 'Ubah Jam Operasional',
            'data' => DB::table('jam_operasional')->where('id_jam_operasional', base64_decode($id))->first()
        ]);
    }

    public function update_jam_operasional(Request $request)
    {
        $rules = [
            'nomor_hari' => $request->hari,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup
        ];

        DB::table('jam_operasional')->where('id_jam_operasional', $request->id)->update($rules);

        return redirect('restoran/detail/' . base64_encode($request->id_restoran));
    }

    public function listDataMenu(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->menu->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $teksTersedia = $row->apakah_habis == 'ya' ? 'Tersedia' : 'Stok Habis';
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a style="cursor: pointer" onclick="ubah(' . $row->id_menu . ')" title="Edit Menu" class="dropdown-item">Ubah</a>';
                    $btn .= '<a style="cursor: pointer" onclick="ubahStok(' . $row->id_menu . ')" title="" class="dropdown-item">'. $teksTersedia .'</a>';
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapus(' . $row->id_menu . ')"> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('gambar', function ($row) {
                    return $gambar = '<img src="https://priludestudio.com/jali/webuser/public/menu/'. $row->gambar_menu .'" class="img-thumbnail" width="100%"/>';
                })
                ->addColumn('kategori_menu', function ($row) {
                    return $row->id_kategori_menu ? DB::table('kategori_menu')->where('id_kategori_menu', $row->id_kategori_menu)->first('kategori')->kategori : '-';
                })
                ->addColumn('harga', function ($row) {
                    return 'Rp. ' . number_format($row->harga_jual,0,',','.');
                })
                ->addColumn('harga_promo', function ($row) {
                    return 'Rp. ' . number_format($row->harga_promo,0,',','.');
                })
                ->addColumn('ket_stok', function ($row) {
                    return $row->apakah_habis == 'ya' ? 'Stok Habis' : 'Tersedia';
                })
                ->rawColumns(['action', 'gambar', 'kategori_menu', 'harga', 'harga_promo', 'ket_stok'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function saveMenu(Request $request)
    {
        $id = $request->get('id_menu');

        if ($id) {
            $validate['nama_menu']          = $request->get('nama_menu');
            $validate['deskripsi']          = $request->get('deskripsi');
            $validate['harga_jual']         = $request->get('harga_jual');
            $validate['harga_promo']        = $request->get('harga_promo');
            $validate['id_restoran']        = $request->get('fk_id_restoran');
            $validate['id_kategori_menu']   = $request->get('id_kategori_menu');
            $validate['gambar_menu']        = $request->get('gambar_new') ? $request->get('gambar_new') : $request->get('gambar_lama');

            $this->menu->where('id_menu', $id)->update($validate);
            echo json_encode(['status' => 'update']);
        } else {
            $validate['nama_menu']          = $request->get('nama_menu');
            $validate['deskripsi']          = $request->get('deskripsi');
            $validate['harga_jual']         = $request->get('harga_jual');
            $validate['harga_promo']        = $request->get('harga_promo');
            $validate['id_restoran']        = $request->get('fk_id_restoran');
            $validate['id_kategori_menu']   = $request->get('id_kategori_menu');
            $validate['gambar_menu']        = $request->get('gambar_new');

            $this->menu->create($validate);
            echo json_encode(['status' => 'add']);
        }
    }

    public function reqDataMenu($id)
    {
        $q = $this->menu->find($id);
        echo json_encode($q);
    }

    public function deleteMenu(Request $request)
    {
        $cek = DB::table('menu')->where('id_menu', $request->get('id'))->first();

        if (file_exists('public/menu/' . $cek->gambar_menu) && $cek->gambar_menu != null) {
            unlink('public/menu/' . $cek->gambar_menu);
        }

        $this->menu->where('id_menu', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }

    public function kategoriMenu(String $id)
    {
        $data = [
            'title'       => 'Kategori Menu',
            'id_restoran' => base64_decode($id)
        ];

        return view('kategorimenu.index', $data);
    }

    public function listDataKategoriMenu(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->kategori->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a style="cursor: pointer" onclick="ubah(' . $row->id_kategori_menu . ')" title="Edit Menu" class="dropdown-item">Ubah</a>';
                    $btn .= '<div class="dropdown-divider"></div>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapus(' . $row->id_kategori_menu . ')"> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function saveKategoriMenu(Request $request)
    {
        $id = $request->get('id');

        if ($id) {
            $validate['kategori']     = $request->get('kategori');
            $validate['id_restoran']  = $request->get('fk_id_restoran');

            $this->kategori->where('id_kategori_menu', $id)->update($validate);
            echo json_encode(['status' => 'update']);
        } else {
            $validate['kategori']     = $request->get('kategori');
            $validate['id_restoran']  = $request->get('fk_id_restoran');

            $this->kategori->create($validate);
            echo json_encode(['status' => 'add']);
        }
    }

    public function reqDataKategoriMenu($id)
    {
        $q = $this->kategori->find($id);
        echo json_encode($q);
    }

    public function deleteKategoriMenu(Request $request)
    {
        $this->kategori->where('id_kategori_menu', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }

    public function ubahStokMenu(Request $request)
    {
        $cek = DB::table('menu')->where('id_menu', $request->get('id'))->first();

        $ket = $cek->apakah_habis == 'ya' ? 'tidak' : 'ya';

        $this->menu->where('id_menu', $request->get('id'))->update(['apakah_habis' => $ket]);
        return response()->json(['status' => 'oke']);
    }

    public function checkPassword(Request $request)
    {
        $pengguna = Pengguna::where('alamat_email', session('alamat_email'))->first();

        if (!password_verify($request->password, $pengguna['kata_kunci'])) {
            return response()->json(['status' => false], 401);
        }

        return response()->json(['status' => true], 200);
    }
}
