<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tarif extends Model
{
    use HasFactory;
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    protected $guarded = ['id_tarif'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        $this->dt->orderBy('tarif.id_layanan', 'asc');
        $this->dt->orderBy('tarif.id_jarak_tarif', 'asc');

        if ($request->get('jenis_tarif') != '') {
            $this->dt->where('tarif.id_jenis_tarif', $request->get('jenis_tarif'));
        }

        if ($request->get('jenis_layanan') != '') {
            $this->dt->where('tarif.id_layanan', $request->get('jenis_layanan'));
        } else if ($request->get('jenis_layanan') != 'alldata') {

        }

        if ($request->get('kota') != '') {
            $this->dt->where('tarif.id_kota', $request->get('kota'));
        }

        if ($request->get('jarak_tarif') != '') {
            $this->dt->where('tarif.id_jarak_tarif', $request->get('jarak_tarif'));
        }

        return $this->dt;
    }
}
