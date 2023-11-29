<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gajis extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_slip',
        'slip_date',
        'position_id',
        'gaji_pokok',
    ];

    // Define the relationship with the Position model
    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }
}
