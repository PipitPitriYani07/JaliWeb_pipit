<?php

namespace App\Http\Controllers;

use App\Models\JenisTarif;
use Illuminate\Http\Request;

class JenisTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JenisTarif $jenisTarif)
    {
        $data = [
            'title' => 'Jenis Tarif',
            'data'  => $jenisTarif->all()
        ];
        return view('jenistarif.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(JenisTarif $jenisTarif, int $id = null)
    {
        $data = [
            'title' => 'Form Jenis Tarif',
            'data'  => $jenisTarif->find($id)
        ];

        return view('jenistarif.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JenisTarif $jenisTarif)
    {
        $validate = $request->validate([
            'jenis_tarif' => 'required',
            'keterangan'  => 'required'
        ]);
        $id = $request->id;
        if ($id) {
            $jenisTarif->where('id_jenis_tarif', $id)->update($validate);
            return redirect('jenis_tarif')->with('success', 'Berhasil perbarui');
        } else {
            $jenisTarif->create($validate);
            return redirect('jenis_tarif')->with('success', 'Berhasil menambah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisTarif  $jenisTarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTarif $jenisTarif, int $id)
    {
        $jenisTarif->destroy($id);
        return redirect('jenis_tarif')->with('success', 'Berhasil menghapus');
    }
}
