<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoMitra extends Model
{
    use HasFactory;
    protected $table = 'info_mitra';
    protected $primaryKey = 'id_info_mitra';
    protected $guarded = ['id_info_mitra'];
    public $timestamps = false;
}
