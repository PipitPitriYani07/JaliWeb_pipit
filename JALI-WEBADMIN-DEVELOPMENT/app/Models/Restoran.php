<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Restoran extends Model
{
    use HasFactory;
    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    protected $guarded = ['id_restoran'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        if ($request->get('search') != '') {
            $this->dt->where('nama_restoran', 'like', '%' . $request->get('search') . '%');
            $this->dt->orWhere('alamat', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('id_kota_layanan') != '') {
            $this->dt->where('restoran.id_kota_layanan', $request->get('id_kota_layanan'));
        }

        if ($request->get('id_status_restoran') != '') {
            $this->dt->where('restoran.id_status_restoran', $request->get('id_status_restoran'));
        }
        return $this->dt;
    }
}
