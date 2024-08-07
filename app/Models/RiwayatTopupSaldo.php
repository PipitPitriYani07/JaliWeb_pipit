<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatTopupSaldo extends Model
{
    use HasFactory;
    protected $table = 'riwayat_topup_saldo';
    protected $primaryKey = 'id_riwayat_topup_saldo';
    protected $guarded = ['id_riwayat_topup_saldo'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        if ($request->get('id_topup_saldo') != '') {
            $this->dt->where('id_topup_saldo', $request->get('id_topup_saldo'));
        }
        return $this->dt;
    }
}
