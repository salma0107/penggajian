<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_slip',
        'slip_date',

        'pegawai_id',
        'nama_pegawai',
        'email',
        'golongan',
        'status_perkawinan',
        'divise_id',
        
        'position_id',
        'gaji_pokok',

        'gaji_bersih',
        
    ];

    // Define the relationship with model
    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawais::class, 'pegawai_id');
    }

    public function divise()
    {
        return $this->belongsTo(Divises::class, 'divise_id');
    }
}
