<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    const ACTIVE_ROUTE = 1;
    const DEACTIVE_ROUTE = 0;

    protected $fillable = [
        'route_number',
        'description',
        'start_point_outbound',
        'end_point_outbound',
        'start_point_inbound',
        'end_point_inbound',
        'status',
    ];
}
