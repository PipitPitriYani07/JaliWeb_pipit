<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\KotaLayanan;

class LayananController extends Controller
{
    protected $provinsi;
    protected $kota;
    protected $kotaLayanan;

    public function __construct()
    {
        $this->provinsi = new Provinsi();
        $this->kota = new Kota();
        $this->kotaLayanan = new KotaLayanan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Pengaturan Wilayah',
        ];
        return view('kotalayanan.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->provinsi->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('formprovinsi/' . base64_encode($row->id_provinsi)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapusProvinsi(' . $row->id_provinsi . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '<button type="button" class="btn btn-primary" onClick="showKota(' . $row->id_provinsi . ')">';
                    $btn .= '<i class="fa fa-play"></i>';
                    $btn .= '</button>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function formprovinsi(String $id = null)
    {
        $data = [
            'title' => 'Add Provinsi',
            'data' => $this->provinsi->find(base64_decode($id))
        ];
        return view('kotalayanan.formprovinsi', $data);
    }

    public function saveProvinsi(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {

            $validate = $request->validate([
                'nama_provinsi'      => ['required', 'unique:provinsi'],
            ]);

            $this->provinsi->create($validate);
            return redirect('pengaturan_wilayah')->with('success', 'Berhasil menyimpan provinsi');
        } else {
            $uniqueNo = $request->get('nama_provinsi') != $request->get('nama_provinsi_lama') ? 'unique:provinsi' : 'required';

            $validate = $request->validate([
                'nama_provinsi'      => [$uniqueNo],
            ]);

            $this->provinsi->where('id_provinsi', $id)->update($validate);
            return redirect('pengaturan_wilayah')->with('success', 'Berhasil memperbarui provinsi');
        }
    }

    public function ambilProvinsi(Request $request)
    {
        $id = $request->get('id');
        $query = DB::table('provinsi')->where('id_provinsi', $id)->first();
        return response()->json($query, 200);
    }

    public function listDataKota(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->kota->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('formkota/' . $row->id_provinsi . '/' . base64_encode($row->id_kota)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<button type="button" class="dropdown-item" onclick="hapusKota(' . $row->id_kota . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('lokasi', function ($row) {
                    if ($row->latitude != null && $row->longitude != null) {
                        $btn = '<a href="https://google.com/maps/place/' . $row->latitude . ',%20' . $row->longitude . '" target="_blank" class="btn btn-warning btn-sm">';
                        $btn .= '<i class="fas fa-map-marker-alt"></i> Lihat Lokasi';
                        $btn .= '</a>';
                    } else {
                        $btn = '<button type="button" class="btn btn-secondary btn-sm" onclick="errorKota(' . $row->id_kota . ')"><i class="fas fa-map-marker-alt"></i> Lihat Lokasi</button>';
                    }

                    return $btn;
                })
                ->addColumn('nama_provinsi', function ($row) {
                    return $row->id_provinsi ? DB::table('provinsi')->where('id_provinsi', $row->id_provinsi)->first('nama_provinsi')->nama_provinsi : '-';
                })
                ->rawColumns(['action', 'lokasi'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function deleteProvinsi(Request $request)
    {
        $this->provinsi->where('id_provinsi', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }

    public function formkota(Request $request, $id = null, $id_kota = null)
    {
        $query = $this->kota->find(base64_decode($id_kota));

        $data = [
            'title' => 'Form Kota',
            'data'  => $query,
            'provinsi' => DB::table('provinsi')->get(),
            'id_provinsi' => $id,
        ];
        return view('kotalayanan.formkota', $data);
    }

    public function saveKota(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {

            $validate = $request->validate([
                'nama_kota'      => ['required', 'unique:kota'],
            ]);

            $validate['id_provinsi'] = $request->get('id_provinsi');

            $this->kota->create($validate);
            return redirect('pengaturan_wilayah')->with('success', 'Berhasil menambahkan kota');
        } else {
            $validate['nama_kota'] = $request->get('nama_kota');
            $validate['id_provinsi'] = $request->get('id_provinsi');

            $this->kota->where('id_kota', $id)->update($validate);
            return redirect('pengaturan_wilayah')->with('success', 'Berhasil memperbarui kota');
        }
    }

    public function deleteKota(Request $request)
    {
        $this->kota->where('id_kota', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }

    public function index_kotalayanan()
    {
        $data = [
            'title'                 => 'Pengaturan Wilayah',
            'kota'                  => DB::table('kota')->get(),
            'pengguna_pengelola'    => DB::table('pengguna')->where('id_jenis_pengguna', '01')->get(),
            'provinsi'              => DB::table('provinsi')->get()
        ];

        return view('kotalayanan.index_kotalayanan', $data);
    }

    public function listDataKotaLayanan(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->kotaLayanan->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a style="cursor: pointer" onclick="pengelola(' . $row->id_kota . ')" title="Pengelola Layanan Kota" class="dropdown-item">Atur Pengelola</a>';
                    $btn .= '<a style="cursor: pointer" onclick="ubah(' . $row->id_kota_layanan . ')" title="Edit Layanan Kota" class="dropdown-item">Ubah</a>';
                    $btn .= '<a style="cursor: pointer" href="https://google.com/maps/place/' . $row->latitude . ',%20' . $row->longitude . '" target="_blank" title="Lihat Peta" class="dropdown-item">Lihat Peta</a>';
                    $btn .= '<hr>';
                    $btn .= '<button type="submit" class="dropdown-item" onclick="del(' . $row->id_kota_layanan . ')" title="Hapus Layanan Kota">Hapus</button>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('pengelola', function ($row) {
                    $pengelola = '';
                    $dataPengelola = DB::table('pengelola_kota')
                        ->join('pengguna', 'pengguna.id_pengguna', 'pengelola_kota.id_pengguna', 'left')
                        ->where('pengelola_kota.id_kota', $row->id_kota)->get();

                    foreach ($dataPengelola as $show) {
                        $pengelola .= $show->nama_lengkap . ', ';
                    }

                    return $pengelola;
                })
                ->rawColumns(['action', 'pengelola'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function saveKotaLayanan(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {
            $validate['id_kota'] = $request->get('id_kota');
            $validate['latitude'] = $request->get('latitude');
            $validate['longitude'] = $request->get('longitude');

            $this->kotaLayanan->create($validate);
            return redirect('layanan')->with('success', 'Berhasil menambahkan layanan kota');
        } else {
            $validate['id_kota'] = $request->get('id_kota');
            $validate['latitude'] = $request->get('latitude');
            $validate['longitude'] = $request->get('longitude');

            $this->kotaLayanan->where('id_kota_layanan', $id)->update($validate);
            return redirect('layanan')->with('success', 'Berhasil memperbarui layanan kota');
        }
    }

    public function deleteKotaLayanan(Request $request)
    {
        $this->kotaLayanan->where('id_kota_layanan', $request->get('id'))->delete();
        echo json_encode(['status' => true]);
    }

    public function reqData($id)
    {
        $q = $this->kotaLayanan->find($id);
        echo json_encode($q);
    }
}
