<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JarakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Jarak Tarif',
            'data'  => DB::table('jarak_tarif')->get()
        ];
        return view('jarak.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = [
            'title' => 'Ubah Jarak Tarif',
            'data'  => DB::table('jarak_tarif')->where('id_jarak_tarif', $id)->first()
        ];

        return view('jarak.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'jarak_tarif' => 'required',
            'keterangan'  => 'required'
        ]);
        $id = $request->id;
        DB::table('jarak_tarif')->where('id_jarak_tarif', $id)->update($validate);
        return redirect('jarak')->with('success', 'Berhasil perbarui');
    }
}
