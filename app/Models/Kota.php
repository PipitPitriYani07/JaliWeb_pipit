<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'kota';
    protected $primaryKey = 'id_kota';
    protected $guarded = ['id_kota'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        if ($request->get('id') != '') {
            $this->dt->where('id_provinsi', $request->get('id'));
        }
        $this->dt->leftJoin('kota_layanan', 'kota.id_kota', '=', 'kota_layanan.id_kota');
        $this->dt->select('kota.*', 'kota_layanan.latitude', 'kota_layanan.longitude');
        return $this->dt;
    }
}
