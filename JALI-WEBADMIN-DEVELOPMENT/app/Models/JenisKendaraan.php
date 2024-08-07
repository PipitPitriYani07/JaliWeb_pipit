<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kendaraan';
    protected $primaryKey = 'id_jenis_kendaraan';
    protected $guarded = ['id_jenis_kendaraan'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        return $this->dt;
    }
}
