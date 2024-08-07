<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengelolaKota extends Model
{
    use HasFactory;
    protected $table = 'pengelola_kota';
    protected $primaryKey = 'id_pengelola_kota';
    protected $guarded = ['id_pengelola_kota'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        $this->dt->join('pengguna', 'pengguna.id_pengguna', '=', 'pengelola_kota.id_pengguna', 'left');

        if ($request->get('id_kota') != '') {
            $this->dt->where('pengelola_kota.id_kota', $request->get('id_kota'));
        }

        return $this->dt;
    }
}
