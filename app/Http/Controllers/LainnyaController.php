<?php

namespace App\Http\Controllers;

use App\Libraries\IndoTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class LainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => 'Lainnya',
        ];

        return view('lainnya.index', $data);
    }

    public function indexBagiHasil()
    {
      $data = [
          'title' => 'Atur Bagi Hasil',
          'data' => DB::table('pengaturan')->where('kode_pengaturan', 'ADMIN_FEE')->first()
      ];

      return view('lainnya.index_bagi_hasil', $data);
    }

    public function saveBagiHasil(Request $request)
    {
        $validate = $request->validate([
            'nilai' => ['required'],
        ]);

        DB::table('pengaturan')->where('kode_pengaturan', 'ADMIN_FEE')->update($validate);

        return redirect('lainnya/bagi-hasil')->with('success', 'Berhasil memperbarui nilai bagi hasil');
    }
}
