<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    protected $primaryKey = 'id_saldo';
    protected $guarded = ['id_saldo'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        return $this->dt;
    }
}
