<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangans extends Model
{
    use HasFactory;

    protected $fillable = [
        'tunjangan',
        'position_id',
        'besar_tunjangan',
    ];

    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }

}
