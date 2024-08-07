<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $guarded = ['id_transaksi'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table)->orderBy('transaksi.waktu_pemesanan', 'desc');
        if ($request->get('status') != '') {
            $this->dt->where('transaksi.id_status_transaksi', $request->get('status'));

            $request->session()->put([
                'transaksi_status' => $request->get('status')
            ]);
        } else {
            $request->session()->put([
                'transaksi_status' => ''
            ]);
        }

        if ($request->get('mulai') != '' || $request->get('selesai') != '') {
            $startdate = Carbon::parse($request->get('mulai'))->startOfDay();
            $enddate = Carbon::parse($request->get('selesai'))->endOfDay();

            $this->dt->whereBetween('waktu_pemesanan', [$startdate, $enddate]);

            $request->session()->put([
                'transaksi_mulai' => $request->get('mulai'),
                'transaksi_selesai' => $request->get('selesai')
            ]);
        } else {
            $request->session()->put([
                'transaksi_mulai' => '',
                'transaksi_selesai' => ''
            ]);
        }

        if ($request->get('search_pengguna') != '') {
            $this->dt->leftJoin('pengguna', 'pengguna.id_pengguna', '=', 'transaksi.id_pengguna_mitra');
            $this->dt->where('transaksi.id_transaksi', 'like', '%' . $request->get('search_pengguna') . '%');
            $this->dt->orWhere('pengguna.nama_lengkap', 'like', '%' . $request->get('search_pengguna') . '%');

            $request->session()->put([
                'transaksi_search_pengguna' => $request->get('search_pengguna')
            ]);
        } else {
            $request->session()->put([
                'transaksi_search_pengguna' => ''
            ]);
        }

        if ($request->get('id_pengguna') != '') {
            $this->dt->where('id_pengguna_pemesan', $request->get('id_pengguna'));
        }

        if ($request->get('pengguna_mitra') != '') {
            $this->dt->where('id_pengguna_mitra', $request->get('pengguna_mitra'));
        }

        if ($request->get('layanan') != '') {
            $this->dt->where('id_layanan', $request->get('layanan'));

            $request->session()->put([
                'transaksi_layanan' => $request->get('layanan')
            ]);
        } else {
            $request->session()->put([
                'transaksi_layanan' => ''
            ]);
        }

        return $this->dt;
    }

    public function getDatatablesForDashboard(Request $request)
    {
        $this->dt = DB::table($this->table)->orderBy('transaksi.waktu_pemesanan', 'desc');
        if ($request->get('id_pengguna') != '') {
            $this->dt->where('id_pengguna_pemesan', $request->get('id_pengguna'));
        }

        if ($request->get('pengguna_mitra') != '') {
            $this->dt->where('id_pengguna_mitra', $request->get('pengguna_mitra'));
        }

        return $this->dt;
    }
}
