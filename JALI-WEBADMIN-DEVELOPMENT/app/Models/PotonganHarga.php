<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PotonganHarga extends Model
{
    use HasFactory;
    protected $table = 'promo';
    protected $primaryKey = 'id_promo';
    protected $guarded = ['id_promo'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        if ($request->get('search') != '') {
            $this->dt->where('kode_promo', 'like', '%' . $request->get('search') . '%');
            $this->dt->orWhere('judul_promo', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('id_jenis_promo') != '') {
            $this->dt->where('id_jenis_promo', $request->get('id_jenis_promo'));
        }

        if ($request->get('status') != '') {
            $this->dt->where('status', $request->get('status'));
        }

        return $this->dt;
    }
}
