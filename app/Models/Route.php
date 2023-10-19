<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function startOutboundCity()
    {
        return $this->belongsTo(City::class, 'start_point_outbound');
    }

    public function endOutboundCity()
    {
        return $this->belongsTo(City::class, 'end_point_outbound');
    }

    public function startInboundCity()
    {
        return $this->belongsTo(City::class, 'start_point_inbound');
    }

    public function endInboundCity()
    {
        return $this->belongsTo(City::class, 'end_point_inbound');
    }
}
