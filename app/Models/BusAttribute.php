<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'ac',
        'manufacturer',
        'manufacture_year',
        'seating_capacity',
        'insurance_expireDate',
        'fuel_type',
    ];

    /**
     * Define the inverse of the one-to-one relationship with the Bus model.
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
