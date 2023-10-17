<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    const ACTIVE_BUS = 1;
    const DEACTIVE_BUS = 0;
}
