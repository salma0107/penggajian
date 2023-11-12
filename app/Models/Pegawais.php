<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawais extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_pegawai',
        'nama_pegawai',
        'email',
        'alamat',
        'position_id',
        'golongan',
        'status_perkawinan',
        'no_rekening',
    ];

    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }
}