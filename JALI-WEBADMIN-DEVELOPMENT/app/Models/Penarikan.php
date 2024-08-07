<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Penarikan extends Model
{
    use HasFactory;
    protected $table = 'penarikan';
    protected $primaryKey = 'id_penarikan';
    protected $guarded = ['id_penarikan'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table)->orderBy('penarikan.id_penarikan', 'DESC');
        $this->dt->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'penarikan.id_pengguna');
        $this->dt->select('penarikan.*', 'pengguna.nama_lengkap');
        $this->dt->distinct();

        if ($request->get('status') != '') {
            $this->dt->where('penarikan.id_status_transaksi', $request->get('status'));
        }

        if ($request->get('mulai') != '' || $request->get('selesai') != '') {
            $startdate = Carbon::parse($request->get('mulai'))->startOfDay();
            $enddate = Carbon::parse($request->get('selesai'))->endOfDay();

            $this->dt->whereBetween('penarikan.waktu_permintaan', [$startdate, $enddate]);
        }

        if ($request->get('search_pengguna') != '') {
            $this->dt->where('pengguna.nama_lengkap', 'like', '%' . $request->get('search_pengguna') . '%');
            $this->dt->orWhere('pengguna.nama_lengkap', 'like', '%' . $request->get('search_pengguna') . '%');
        }

        return $this->dt;
    }
}
