<?php

namespace App\Modules\ReportManagement\Repositories;

use App\Models\Bus;
use App\Models\User;
use App\Models\BusAttribute;
use Illuminate\Support\Facades\Log;
use App\Models\UserType;

class ReportRepository
{
    public function getAll($perPage = 10)
    {
        return Bus::with('busAttribute')->paginate($perPage);
    }

}