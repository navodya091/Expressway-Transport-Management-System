<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    const ACTIVE_BUS = 1;
    const DEACTIVE_BUS = 0;

    protected $fillable = [
        'driver_id',
        'bus_attribute_id',
        'bus_number',
        'status',
    ];

    /**
     * Define a one-to-one relationship with BusAttribute model.
     */
    public function busAttribute()
    {
        return $this->hasOne(BusAttribute::class);
    }


}
