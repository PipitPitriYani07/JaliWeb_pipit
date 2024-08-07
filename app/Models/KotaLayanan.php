<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaLayanan extends Model
{
    use HasFactory;
    protected $table = 'kota_layanan';
    protected $primaryKey = 'id_kota_layanan';
    protected $guarded = ['id_kota_layanan'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        // $search = $request->search;
        // $provinsi = $request->provinsi;
        $this->dt = DB::table($this->table);

        $this->dt->join('kota', 'kota.id_kota', '=', 'kota_layanan.id_kota', 'left');
        $this->dt->join('provinsi', 'provinsi.id_provinsi', '=', 'kota.id_provinsi', 'left');

        if ($request->get('search')) {
            $this->dt->where('kota.nama_kota', 'like', $request->get('search'));
            $this->dt->orWhere('provinsi.nama_provinsi', 'like', $request->get('search'));
        }

        if ($request->get('provinsi')) {
            $this->dt->where('provinsi.id_provinsi', $request->get('provinsi'));
        }

        return $this->dt;
    }
}
