<?php

namespace App\Modules\Dashboard\Repositories;

namespace App\Modules\Dashboard\Repositories;

use App\Models\User;
use App\Models\Bus;
use App\Models\UserType;

class DashboardRepository
{
    public function getAll()
    {
        try {
            $data = [];
            $users = User::where('status', User::ACTIVE_USER)->get();
            $buses = Bus::where('status', Bus::ACTIVE_BUS)->get();

            $data['data_entry_users'] =  $users->where('user_type_id', UserType::USER_TYPE_DATA_ENTRY_USER)->count();
            $data['drivers'] = $users->where('user_type_id', UserType::USER_TYPE_DRIVER)->count();
            $data['buses'] = $buses->count();
           
            return $data;
        } catch (\Exception $e) { 
            // Handle the exception or log it as needed
            return null;
        }
    }
}
