<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    use HasFactory;

    protected $table = 'rekening_bank';
    protected $primaryKey = 'id_rekening_bank';
    protected $guarded = ['id_rekening_bank'];
    public $timestamps = false;


    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }
}
