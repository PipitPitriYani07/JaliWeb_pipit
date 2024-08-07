<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTarif extends Model
{
    use HasFactory;
    protected $table = 'jenis_tarif';
    protected $primaryKey = 'id_jenis_tarif';
    protected $guarded = ['id_jenis_tarif'];
    public $timestamps = false;
}
