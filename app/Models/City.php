<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;


    public function outboundStartRoutes()
    {
        return $this->hasMany(Route::class, 'start_point_outbound');
    }

    public function outboundEndRoutes()
    {
        return $this->hasMany(Route::class, 'end_point_outbound');
    }

    public function inboundStartRoutes()
    {
        return $this->hasMany(Route::class, 'start_point_inbound');
    }

    public function inboundEndRoutes()
    {
        return $this->hasMany(Route::class, 'end_point_inbound');
    }

}
