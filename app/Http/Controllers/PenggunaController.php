<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PengelolaKota;
use App\Models\Saldo;
use App\Models\InfoMitra;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{

    private Pengguna $model;
    private PengelolaKota $pengelola;
    private Saldo $saldo;

    public function __construct()
    {
        $this->model = new Pengguna();
        $this->pengelola = new PengelolaKota();
        $this->saldo = new Saldo();
        $this->infoMitra = new InfoMitra();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'             => 'Pengguna',
            'jenis_pengguna'    => DB::table('jenis_pengguna')->get(),
            'total_admin'       => Pengguna::where('id_jenis_pengguna', '00')->count(),
            'total_admin_kota'  => Pengguna::where('id_jenis_pengguna', '01')->count(),
            'total_konsumen'    => Pengguna::where('id_jenis_pengguna', '11')->count(),
            'total_mitra'       => Pengguna::where('id_jenis_pengguna', '12')->count()
        ];
        return view('pengguna.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('checked', function ($row) {
                    $checkbox = '<div class="custom-control custom-checkbox" style="text-align:center">';
                    $checkbox .= '<input class="custom-control-input data-check" type="checkbox" id="check_' . $row->id_pengguna . '" value="' . $row->id_pengguna . '">';
                    $checkbox .= '<label for="check_' . $row->id_pengguna . '" class="custom-control-label"></label></div>';
                    return $checkbox;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div style="text-align: center">';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('pengguna/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-user"></i> Detail Pengguna</a>';
                    $btn .= '<a href="' . url('pengguna/form/' . base64_encode($row->id_pengguna)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapusPengguna(' . $row->id_pengguna . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('terakhir_login', function ($row) {
                    $indotime = new IndoTime();
                    return $row->terakhir_login ? $indotime->convertDateTime($row->terakhir_login, 3) : '-';
                })
                ->addColumn('jalur_pendaftaran', function ($row) {
                    return $row->id_jalur_pendaftaran ? DB::table('jalur_pendaftaran')->where('id_jalur_pendaftaran', $row->id_jalur_pendaftaran)->first('jalur_pendaftaran')->jalur_pendaftaran : '-';
                })
                ->addColumn('jenis_pengguna', function ($row) {
                    return $row->id_jenis_pengguna ? DB::table('jenis_pengguna')->where('id_jenis_pengguna', $row->id_jenis_pengguna)->first('jenis_pengguna')->jenis_pengguna : '-';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function form(String $id = null)
    {
        $data = [
            'title' => 'Form Pengguna',
            'jenis_pengguna' => DB::table('jenis_pengguna')->get(),
            'data' => $this->model->find(base64_decode($id))
        ];
        return view('pengguna.form', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {

            $validate = $request->validate([
                'alamat_email'      => ['required', 'email:dns', 'unique:pengguna'],
                'no_handphone'      => ['required', 'unique:pengguna'],
            ]);
            $validate['kata_kunci'] = Hash::make($request->get('kata_kunci'));
            $validate['waktu_daftar'] = date('Y-m-d H:i:s');
            $validate['foto_profile'] = '';
            $validate['id_jalur_pendaftaran'] = '01';
            $validate['id_jenis_pengguna'] = $request->get('id_jenis_pengguna');
            $validate['nama_lengkap'] = $request->get('nama_lengkap');
            $validate['firebase_id_token'] = '';

            $idPengguna = $this->model->create($validate);

            if ($request->get('id_jenis_pengguna') == '12') {
                return redirect('pengguna/form-info-mitra/' . base64_encode($idPengguna['id_pengguna']))->with('success', 'Berhasil simpan');
            } else {
                return redirect('pengguna')->with('success', 'Berhasil simpan');
            }
        } else {
            $uniqueEmail = $request->get('alamat_email') != $request->get('alamat_email_lama') ? 'unique:pengguna' : 'required';
            $uniqueNo = $request->get('no_handphone') != $request->get('no_handphone_lama') ? 'unique:pengguna' : 'required';

            $validate = $request->validate([
                'alamat_email'      => ['email:dns', $uniqueEmail],
                'no_handphone'      => [$uniqueNo],
            ]);
            $validate['id_jenis_pengguna'] = $request->get('id_jenis_pengguna');
            $validate['nama_lengkap'] = $request->get('nama_lengkap');

            if ($request->get('kata_kunci')) {
                $validate['kata_kunci'] = Hash::make($request->get('kata_kunci'));
            }
            $this->model->where('id_pengguna', $id)->update($validate);

            return redirect('pengguna')->with('success', 'Berhasil perbarui');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id = null)
    {
        if ($id != null) {
            $this->model->destroy(base64_decode($id));
            return redirect('pengguna')->with('success', 'Berhasil dihapus');
        } else {
            $this->model->where('id_pengguna', $request->get('id'))->delete();
            return response()->json(['status' => 'oke']);
        }
    }
    public function detail_pengguna(String $id)
    {
        $saldo = DB::table('saldo')->where('id_pengguna', base64_decode($id))->first();
        $data = [
            'title'     => 'Pengguna',
            'userdetail' => DB::table('alamat_pengguna')->where('id_pengguna', base64_decode($id))->first(),
            'data'      => $this->model->find(base64_decode($id)),
            'saldo'     => $saldo,
            'riwayat'   => DB::table('riwayat_saldo')->where('id_saldo', @$saldo->id_saldo)->orderBy('waktu_perubahan', 'desc')->get(),
            'WEB_USER'  => 'https://priludestudio.com/jali/webuser/'
        ];

        // dd($data['riwayat']);

        return view('pengguna.detail_pengguna', $data);
    }

    public function listDataPengelola(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->pengelola->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<i class="fa fa-trash" style="color: red; cursor: pointer"></i>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function addPengelola(Request $request)
    {
        $validate['waktu_ditetapkan'] = date('Y-m-d H:i:s');
        $validate['id_kota'] = $request->get('fk_id_kota');
        $validate['id_pengguna'] = $request->get('id_pengguna');

        $this->pengelola->create($validate);
        echo json_encode(['status' => 'add']);
    }

    public function saveSaldo(Request $request)
    {
        $id = $request->get('id_pengguna');
        $cek = DB::table('saldo')->where('id_pengguna', $id)->first();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->first();
        $nama_admin = $pengguna->nama_lengkap != '' ? $pengguna->nama_lengkap : $pengguna->alamat_email;
        // dd($cek);
        if ($cek == null) {
            $validate['waktu_perubahan']    = date('Y-m-d H:i:s');
            $validate['nominal']            = $request->get('nominal');
            $validate['catatan_perubahan']  = 'Penambahan Dana Oleh Admin: ' . $nama_admin;
            $validate['id_pengguna']        = $request->get('id_pengguna');

            // dd($validate);

            $idSaldo = $this->saldo->create($validate);

            $dataSaldo = [
                'nominal'               => $request->get('nominal'),
                'sisa_saldo'            => $request->get('nominal'),
                'waktu_perubahan'       => date('Y-m-d H:i:s'),
                'jenis_transaksi'       => 'masuk',
                'catatan_transaksi'     => 'Penambahan Dana Oleh Admin: ' . $nama_admin,
                'id_saldo'              => $idSaldo['id_saldo'],
                'id_pengguna_pelaku'    => session()->get('id_pengguna')
            ];

            DB::table('riwayat_saldo')->insert($dataSaldo);

            return redirect('pengguna/' . base64_encode($id))->with('success', 'Berhasil simpan');
        } else {
            $validate['waktu_perubahan']    = date('Y-m-d H:i:s');
            $validate['nominal']            = $cek->nominal + $request->get('nominal');
            $validate['catatan_perubahan']  = 'Penambahan Dana Oleh Admin: ' . $nama_admin;
            $validate['id_pengguna']        = $request->get('id_pengguna');

            $this->saldo->where('id_saldo', $cek->id_saldo)->update($validate);

            $dataSaldo = [
                'nominal'               => $request->get('nominal'),
                'sisa_saldo'            => $cek->nominal + $request->get('nominal'),
                'waktu_perubahan'       => date('Y-m-d H:i:s'),
                'jenis_transaksi'       => 'masuk',
                'catatan_transaksi'     => 'Penambahan Dana Oleh Admin: ' . $nama_admin,
                'id_saldo'              => $cek->id_saldo,
                'id_pengguna_pelaku'    => session()->get('id_pengguna')
            ];

            DB::table('riwayat_saldo')->insert($dataSaldo);

            return redirect('pengguna/' . base64_encode($id))->with('success', 'Berhasil perbarui');
        }
    }

    public function kurangSaldo(Request $request)
    {
        $id = $request->get('id_pengguna');
        $cek = DB::table('saldo')->where('id_pengguna', $id)->first();
        $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->first();
        $nama_admin = $pengguna->nama_lengkap != '' ? $pengguna->nama_lengkap : $pengguna->alamat_email;
        // dd($cek);
        $validate['waktu_perubahan']    = date('Y-m-d H:i:s');
        $validate['nominal']            = $cek->nominal - $request->get('nominal');
        $validate['catatan_perubahan']  = 'Pengurangan Dana Oleh Admin: ' . $nama_admin;
        $validate['id_pengguna']        = $request->get('id_pengguna');

        $this->saldo->where('id_saldo', $cek->id_saldo)->update($validate);

        $dataSaldo = [
            'nominal'               => $request->get('nominal'),
            'sisa_saldo'            => $cek->nominal - $request->get('nominal'),
            'waktu_perubahan'       => date('Y-m-d H:i:s'),
            'jenis_transaksi'       => 'keluar',
            'catatan_transaksi'     => 'Pengurangan Dana Oleh Admin: ' . $nama_admin,
            'id_saldo'              => $cek->id_saldo,
            'id_pengguna_pelaku'    => session()->get('id_pengguna')
        ];

        DB::table('riwayat_saldo')->insert($dataSaldo);

        return redirect('pengguna/' . base64_encode($id))->with('success', 'Berhasil perbarui');
    }

    public function uploadFoto(Request $request)
    {
        $id = $request->get('id');
        $cek = DB::table('pengguna')->where('id_pengguna', $id)->first();

        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->file('image');
        $nama = $image->hashName();
        $image->move('public/profile', $nama);

        if (file_exists('public/profile/' . $cek->foto_profile) && $cek->foto_profile != null) {
            unlink('public/profile/' . $cek->foto_profile);
        }

        if ($this->model->where('id_pengguna', $id)->update(['foto_profile' => $nama])) {
            return redirect('pengguna/' . base64_encode($id))->with('success', 'Berhasil menambahkan foto profile');
        } else {
            return redirect('pengguna/' . base64_encode($id))->with('success', 'Gagal menambahkan foto profile');
        }
    }

    public function viewKirimPesan(String $id)
    {
        $data = [
            'title' => 'Kirim Pesan',
            'pengguna' => $this->model->find(base64_decode($id))
        ];

        return view('pengguna.kirim_pesan', $data);
    }
    public function kirimPesan(Request $request)
    {
        $token = $request->kirimKe;
        $judul = $request->judul;
        $pesan = $request->pesan;

        try {
            $req = Http::withHeaders([
                'Authorization' => 'key=' . config('services.firebase.cloud_messaging_server_key'),
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', [
                'to'        => $token,
                'notification' => [
                    'title'     => $judul,
                    'body'      => $pesan,
                    'priority'  => 'high'
                ]
            ]);

            $response = json_decode($req->body());

            if ($req->status() == 400) {
                return response()->json([
                    'status' => 400,
                    'msg' => 'ID Firebase tidak ada'
                ], 400);
            }

            return response()->json([
                'status' => 200,
                'msg' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'msg' => 'Server error'
            ], 500);
        }
    }

    public function formInfoMitra(String $id)
    {
        $data = [
            'title'           => 'Form Info Mitra',
            'jenis_kendaraan' => DB::table('jenis_kendaraan')->get(),
            'kecamatan'       => DB::table('kecamatan')->get(),
            'status_mitra'    => DB::table('status_mitra')->get(),
            'id_pengguna'     => base64_decode($id),
            'kota_layanan'    => DB::table('kota_layanan')->leftJoin('kota', 'kota.id_kota', '=', 'kota_layanan.id_kota')->get()
        ];

        $info = DB::table('info_mitra')->where('id_pengguna', base64_decode($id))->first();

        if ($info != null) {
          $data['data']       = $info;
        }

        return view('pengguna.forminfomitra', $data);
    }

    public function saveInfoMitra(Request $request)
    {
        $id = $request->get('id');

        if ($id == null) {
            $image = $request->file('foto_stnk');
            $image2 = $request->file('foto_sim');

            if ($image == null || $image2 == null) {
                $namastnk = '';
                $namasim = '';
            } else {
                $stnk = $image->hashName();
                $sim = $image->hashName();
                $image->move('public/infomitra/stnk', $stnk);
                $image2->move('public/infomitra/sim', $sim);
            }

            $validate['id_jenis_kendaraan'] = $request->get('id_jenis_kendaraan');
            $validate['plat_nomor']         = $request->get('plat_nomor');
            $validate['alamat']             = $request->get('alamat');
            $validate['kelurahan']          = $request->get('kelurahan');
            $validate['latitude']           = 0;
            $validate['longitude']          = 0;
            $validate['id_pengguna']        = $request->get('id_pengguna');
            $validate['id_kecamatan']       = $request->get('id_kecamatan');
            $validate['id_status_mitra']    = $request->get('id_status_mitra');
            $validate['foto_stnk']          = $stnk;
            $validate['foto_sim']           = $sim;
            $validate['id_kota_layanan']    = $request->get('id_kota_layanan');

            $this->infoMitra->create($validate);

            return redirect('pengguna/' . base64_encode($request->get('id_pengguna')))->with('success', 'Berhasil simpan');
        } else {
            $cek = DB::table('info_mitra')->where('id_info_mitra', $id)->first();

            $image = $request->file('foto_stnk');
            $image2 = $request->file('foto_sim');
            if (($image == null || $image->getError() !== UPLOAD_ERR_OK) || ($image2 == null || $image2->getError() !== UPLOAD_ERR_OK)) {
                if ($cek->foto_stnk != null || $cek->foto_sim != null) {
                    $stnk = $request->get('foto_stnk_lama');
                    $sim = $request->get('foto_sim_lama');
                } else {
                    $stnk = '';
                    $sim = '';
                }
            } else {
                $stnk = $image->hashName();
                $sim = $image->hashName();
                $image->move('public/infomitra/stnk', $stnk);
                $image2->move('public/infomitra/sim', $sim);
                if (file_exists('public/infomitra/stnk/' . $cek->foto_stnk) && $cek->foto_stnk != null) {
                    unlink('public/infomitra/stnk/' . $cek->foto_stnk);
                }
                if (file_exists('public/infomitra/sim/' . $cek->foto_sim) && $cek->foto_sim != null) {
                    unlink('public/infomitra/sim/' . $cek->foto_sim);
                }
            }

            $validate['id_jenis_kendaraan'] = $request->get('id_jenis_kendaraan');
            $validate['plat_nomor']         = $request->get('plat_nomor');
            $validate['alamat']             = $request->get('alamat');
            $validate['kelurahan']          = $request->get('kelurahan');
            $validate['id_pengguna']        = $request->get('id_pengguna');
            $validate['id_kecamatan']       = $request->get('id_kecamatan');
            $validate['id_status_mitra']    = $request->get('id_status_mitra');
            $validate['foto_stnk']          = $stnk;
            $validate['foto_sim']           = $sim;
            $validate['id_kota_layanan']    = $request->get('id_kota_layanan');

            $this->infoMitra->where('id_info_mitra', $id)->update($validate);

            return redirect('pengguna/' . base64_encode($request->get('id_pengguna')))->with('success', 'Berhasil perbarui');
        }
    }
}
