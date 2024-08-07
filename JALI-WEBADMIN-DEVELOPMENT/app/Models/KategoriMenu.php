<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriMenu extends Model
{
    use HasFactory;
    protected $table = 'kategori_menu';
    protected $primaryKey = 'id_kategori_menu';
    protected $guarded = ['id_kategori_menu'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        if ($request->get('id_restoran') != '') {
            $this->dt->where('id_restoran', $request->get('id_restoran'));
        }
        return $this->dt;
    }
}
