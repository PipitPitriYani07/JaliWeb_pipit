<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestoranKategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_restoran_restoran';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
