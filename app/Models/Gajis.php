<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gajis extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_slip',
        'tanggal_slip',
        'pegawai_id',
        'nama_pegawai',
        'email',
        'alamat',
        'position_id',
        'golongan',
        'status_perkawinan',
        'no_rekening',
        'tunjangan',
        'besar_tunjangan',
        'gaji_kotor',
        'gaji_bersih',
    ];

    // Definisikan relasi dengan model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

}
