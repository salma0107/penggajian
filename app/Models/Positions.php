<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan',
        'gaji_pokok',
    ];

    public function tunjangans()
    {
        return $this->hasMany(Tunjangans::class, 'position_id');
    }
}
