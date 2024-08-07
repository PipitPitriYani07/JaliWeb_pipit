<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusJenisTarif extends Model
{
    use HasFactory;
    protected $table = 'status_jenis_tarif';
    protected $primaryKey = 'id_status_jenis_tarif';
    protected $guarded = ['id_status_jenis_tarif'];
    public $timestamps = false;
}
