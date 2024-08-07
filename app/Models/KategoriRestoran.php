<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriRestoran extends Model
{
    use HasFactory;
    protected $table = 'kategori_restoran';
    protected $primaryKey = 'id_kategori_restoran';
    protected $guarded = ['id_kategori_restoran'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        if ($request->get('search') != '') {
            $this->dt->where('kategori_restoran', 'like', '%' . $request->get('search') . '%');
        }
        return $this->dt;
    }
}
