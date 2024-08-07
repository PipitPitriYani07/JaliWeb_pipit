<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $guarded = ['id_pengguna'];
    protected $column_search = ['nama_lengkap', 'no_handphone', 'alamat_email'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        if ($request->has('jenis_pengguna') && $request->get('jenis_pengguna') != '') {
            $this->dt->where('id_jenis_pengguna', $request->get('jenis_pengguna'));
        }

        if ($request->has('cari') && $request->get('cari') != '') {
            if ($request->has('jenis_pengguna') && $request->get('jenis_pengguna') != '') {
                $this->dt->where(function ($query) use ($request) {
                    $query->where('id_jenis_pengguna', $request->get('jenis_pengguna'))
                          ->where(function ($query) use ($request) {
                              $i = 0;
                              foreach ($this->column_search as $item) {
                                  if ($i === 0) {
                                      $query->where($item, 'like', '%' . $request->get('cari') . '%');
                                  } else {
                                      $query->orWhere($item, 'like', '%' . $request->get('cari') . '%');
                                  }
                                  $i++;
                              }
                          });
                });
            } else {
                $i = 0;
                foreach ($this->column_search as $item) {
                    if ($i === 0) {
                        $this->dt->where($item, 'like', '%' . $request->get('cari') . '%');
                    } else {
                        $this->dt->orWhere($item, 'like', '%' . $request->get('cari') . '%');
                    }
                    $i++;
                }
            }
        }

        return $this->dt;
    }
}
