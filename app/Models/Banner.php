<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $guarded = ['id_banner'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table)->orderBy('id_banner', 'desc');
        if ($request->get('search') != '') {
            $this->dt->where('judul', 'like', '%' . $request->get('search') . '%');
            $this->dt->orWhere('konten', 'like', '%' . $request->get('search') . '%');
        }
        if ($request->get('id_posisi_banner') != '') {
            $this->dt->where('id_posisi_banner', $request->get('id_posisi_banner'));
        }
        return $this->dt;
    }
}
