<?php

namespace App\Modules\BusManagement\Repositories;

use App\Models\Bus;

class BusRepository
{
    public function getAll()
    {
        return Bus::all();
    }
}