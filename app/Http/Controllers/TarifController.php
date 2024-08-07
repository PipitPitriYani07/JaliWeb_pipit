<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tarif;
use App\Models\KotaLayanan;
use App\Models\StatusJenisTarif;

class TarifController extends Controller
{
    public function __construct()
    {
        $this->model= new Tarif();
        $this->kotaLayanan = new KotaLayanan();
        $this->statusJenisTarif = new StatusJenisTarif();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'             => 'Tarif',
            'jenis_tarif'       => DB::table('jenis_tarif')->get(),
            'jenis_layanan'     => DB::table('layanan')->get(),
            'jenis_pengguna'    => DB::table('jenis_pengguna')->get(),
            'kota'              => DB::table('kota')->get(),
            'jarak_tarif'       => DB::table('jarak_tarif')
                ->orderBy('jarak_tarif', 'asc')
                ->get(),
            'provinsi'          => DB::table('provinsi')->get()
        ];

        return view('tarif.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex align-items-center justify-content-center">';
                    $btn .= '<a href="' . url('tarif/' . base64_encode($row->id_kota) . '/kelola/formtarif/' . base64_encode($row->id_tarif)) . '" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm ml-2" onclick="hapusTarif(' . $row->id_tarif . ')"><i class="fa fa-trash"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->addColumn('layanan', function ($row) {
                    return $row->id_layanan ? DB::table('layanan')->where('id_layanan', $row->id_layanan)->first('nama_layanan')->nama_layanan : '-';
                    // return $row->nama_layanan;
                })
                ->addColumn('jenis_tarif', function ($row) {
                    return $row->id_jenis_tarif ? DB::table('jenis_tarif')->where('id_jenis_tarif', $row->id_jenis_tarif)->first('jenis_tarif')->jenis_tarif : '-';
                })
                ->addColumn('jarak_tarif', function ($row) {
                    $jarak_tarif = '';

                    $data = DB::table('jarak_tarif')->where('id_jarak_tarif', $row->id_jarak_tarif)->first();
                    $jarak = DB::table('jarak_tarif')
                        ->orderBy('jarak_tarif', 'asc')
                        ->limit(1)
                        ->first();

                    if ($data->jarak_tarif == $jarak->jarak_tarif) {
                        $jarak_tarif = $data->jarak_tarif . ' km pertama';
                    } else {
                        $jarak_tarif = 'Per KM berikutnya';
                    }

                    return $jarak_tarif;

                    // return $row->id_jarak_tarif ? DB::table('jarak_tarif')->where('id_jarak_tarif', $row->id_jarak_tarif)->first('jarak_tarif')->jarak_tarif : '-';
                })
                ->addColumn('harga_tarif', function ($row) {
                    return 'Rp. ' . number_format($row->harga,0,',','.');
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function formtarif(String $id, String $idTarif)
    {
        $data = [
            'title'             => 'Form Tarif',
            'data'              => $this->model->find(base64_decode($idTarif)),
            'jenis_tarif'       => DB::table('jenis_tarif')->get(),
            'layanan'           => DB::table('layanan')->get(),
            'jenis_pengguna'    => DB::table('jenis_pengguna')->get(),
            'kota'              => DB::table('kota')->get(),
            'jarak_tarif'       => DB::table('jarak_tarif')->get(),
            'id_kota'           => base64_decode($id)
        ];

        return view('tarif.form', $data);
    }

    public function saveTarif(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {
            $validate['harga']          = $request->get('harga');
            $validate['id_jenis_tarif'] = $request->get('id_jenis_tarif');
            $validate['id_layanan']     = $request->get('id_layanan');
            $validate['id_kota']        = $request->get('id_kota');
            $validate['id_jarak_tarif'] = $request->get('id_jarak_tarif');

            $this->model->create($validate);
            return redirect('tarif/' . base64_encode($validate['id_kota']) . '/kelola')->with('success', 'Berhasil menambahkan Tarif');
        } else {
            $validate['harga']          = $request->get('harga');
            $validate['id_jenis_tarif'] = $request->get('id_jenis_tarif');
            $validate['id_layanan']     = $request->get('id_layanan');
            $validate['id_kota']        = $request->get('id_kota');
            $validate['id_jarak_tarif'] = $request->get('id_jarak_tarif');

            $this->model->where('id_tarif', $id)->update($validate);
            return redirect('tarif/' . base64_encode($validate['id_kota']) . '/kelola')->with('success', 'Berhasil memperbarui Tarif');
        }
    }

    public function listDataLayanan(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->kotaLayanan->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex align-items-center justify-content-center">';
                    $btn .= '<a href="' . url('tarif/' . base64_encode($row->id_kota) . '/kelola') . '" class="btn btn-default btn-sm">Kelola</a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function kelola(String $id)
    {
        $kota = DB::table('kota')->where('id_kota', base64_decode($id))->first();

        $data = [
            'title'             => 'Kelola Tarif',
            'jenis_tarif'       => DB::table('jenis_tarif')->get(),
            'jarak_tarif'       => DB::table('jarak_tarif')->get(),
            'data_kota'         => $kota,
            'data_provinsi'     => DB::table('provinsi')->where('id_provinsi', $kota->id_provinsi)->first(),
        ];

        return view('tarif.kelola', $data);
    }

    public function aturMassal(Request $request)
    {
        $kota = DB::table('kota')->get();

        foreach ($kota as $datakota) {
          $data = [
            'id_kota'         => $datakota->id_kota,
            'id_jenis_tarif'  => $request->get('jenis_tarif'),
            'id_layanan'      => $request->get('layanan'),
            'id_jarak_tarif'  => $request->get('jarak'),
            'harga'           => $request->get('harga')
          ];

          // dd($data);

          $kondisi = DB::table('tarif')->where('id_kota', $datakota->id_kota)
            ->where('id_jenis_tarif', $request->get('jenis_tarif'))
            ->where('id_layanan', $request->get('layanan'))
            ->where('id_jarak_tarif', $request->get('jarak'))
            ->first();

          if ($kondisi == null) {
            $this->model->create($data);
          } else {
            $this->model->where('id_tarif', $kondisi->id_tarif)->update($data);
          }
        }

        return redirect('tarif')->with('success', 'Berhasil memperbarui Tarif Massal');;
    }

    public function kelolaTarifKota(Request $request)
    {
        $tarif = DB::table('tarif')->where('id_kota', $request->get('id_kota'))->get();

        // foreach ($tarif as $showTarif) {
        //     $data = [
        //       'id_jenis_tarif'  => $request->get('id_jenis_tarif')
        //     ];
        //     // dd($data);
        //     $kondisi = DB::table('tarif')->where('id_tarif', $showTarif->id_tarif)->first();

        //     $this->model->where('id_tarif', $kondisi->id_tarif)->update($data);
        // }

        $kota_layanan = DB::table('kota_layanan')->where('id_kota', $request->get('id_kota'))->first();

        $dataStatusJenisTarif = [
            'id_jenis_tarif'  => $request->get('id_jenis_tarif'),
            'id_kota_layanan' => $kota_layanan->id_kota_layanan
        ];

        $kondisi2 = DB::table('status_jenis_tarif')->where('id_kota_layanan', $kota_layanan->id_kota_layanan)->first();
        if ($kondisi2 == null) {
            $this->statusJenisTarif->create($dataStatusJenisTarif);
        } else {
            $this->statusJenisTarif->where('id_status_jenis_tarif', $kondisi2->id_status_jenis_tarif)->update($dataStatusJenisTarif);
        }

        return redirect('tarif/' . base64_encode($request->get('id_kota')) . '/kelola')->with('success', 'Berhasil memperbarui Tarif Massal');;
    }

    public function delete(Request $request)
    {
        $this->model->where('id_tarif', $request->get('id'))->delete();
        return response()->json(['status' => 'oke']);
    }
}
