<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopUp extends Model
{
    use HasFactory;
    protected $table = 'topup_saldo';
    protected $primaryKey = 'id_topup_saldo';
    protected $guarded = ['id_topup_saldo'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        $this->dt->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'topup_saldo.id_pengguna');
        $this->dt->select('topup_saldo.*', 'pengguna.nama_lengkap');
        $this->dt->distinct();

        if ($request->get('status') != '') {
            $this->dt->where('topup_saldo.id_status_transaksi', $request->get('status'));

            $request->session()->put([
                'topup_status' => $request->get('status')
            ]);
        } else {
            $request->session()->put([
                'topup_status' => ''
            ]);
        }

        if ($request->get('mulai') != '' || $request->get('selesai') != '') {
            $startdate = Carbon::parse($request->get('mulai'))->startOfDay();
            $enddate = Carbon::parse($request->get('selesai'))->endOfDay();

            $this->dt->whereBetween('topup_saldo.waktu_permintaan', [$startdate, $enddate]);

            $request->session()->put([
                'topup_mulai' => $request->get('mulai'),
                'topup_selesai' => $request->get('selesai')
            ]);
        } else {
            $request->session()->put([
                'topup_mulai' => '',
                'topup_selesai' => ''
            ]);
        }

        if ($request->get('search_pengguna') != '') {
            $this->dt->where('topup_saldo.id_topup_saldo', 'like', '%' . $request->get('search_pengguna') . '%');
            $this->dt->orWhere('pengguna.nama_lengkap', 'like', '%' . $request->get('search_pengguna') . '%');

            $request->session()->put([
                'topup_search_pengguna' => $request->get('search_pengguna')
            ]);
        } else {
            $request->session()->put([
                'topup_search_pengguna' => ''
            ]);
        }

        // if ($request->get('id_pengguna') != '') {
        //     $this->dt->where('topup_saldo.id_pengguna', $request->get('id_pengguna'));
        // }

        $this->dt->orderBy('topup_saldo.waktu_permintaan', 'DESC');
        return $this->dt;
    }
}
