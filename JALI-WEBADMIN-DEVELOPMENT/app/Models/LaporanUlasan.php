<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanUlasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $guarded = ['id_ulasan'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        if ($request->get('laporan_ulasan') != '') {
            $this->dt->where('judul_ulasan', 'like', '%' . $request->get('laporan_ulasan') . '%');
        }
        if ($request->get('bintang') != '') {
          $this->dt->where('nilai_bintang', $request->get('bintang'));
      }

        return $this->dt->get();
    }
}
