<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    const ACTIVE_TRIP = 1;
    const DEACTIVE_TRIP = 0;

    protected $fillable = [
        'route_id',
        'bus_id',
        'direction',
        'departure_time',
        'arrival_time',
        'status',
    ];

     /**
     * Define a one-to-one relationship with bus model.
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
