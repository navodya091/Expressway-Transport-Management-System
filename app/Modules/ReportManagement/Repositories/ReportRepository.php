<?php

namespace App\Modules\ReportManagement\Repositories;

use App\Models\Bus;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Support\Facades\Log;
use App\Models\UserType;

class ReportRepository
{
    public function getAll($filter, $paginate=true)
{
    $data = Trip::query()
        ->when($filter->filled('from_time') && $filter->filled('to_time'), function ($query) use ($filter) {
            $query->where(function ($timeQuery) use ($filter) {
                $timeQuery->whereBetween('departure_time', [
                    $filter->input('from_time'),
                    $filter->input('to_time')
                ])->orWhereBetween('arrival_time', [
                    $filter->input('from_time'),
                    $filter->input('to_time')
                ]);
            });
        })
        ->when($filter->filled('from_city'), function ($query) use ($filter) {
            $fromCity = $filter->input('from_city');
            $query->where(function ($fromCityQuery) use ($fromCity) {
                $fromCityQuery->where('start_point_outbound', $fromCity)
                             ->orWhere('start_point_inbound', $fromCity);
            });
        })
        ->when($filter->filled('route_number'), function ($query) use ($filter) {
            $query->whereHas('route', function ($subQuery) use ($filter) {
                $subQuery->where('route_number', $filter->input('route_number'));
            });
        })

        ->when($filter->filled('driver_name'), function ($query) use ($filter) {
            $query->whereHas('bus.user', function ($subQuery) use ($filter) {  
                $driverName = $filter->input('driver_name');
                $subQuery->where(function ($query) use ($driverName) {
                    $query->where('first_name', 'like', '%' . $driverName . '%')
                          ->orWhere('last_name', 'like', '%' . $driverName . '%');
                });
            });
        })
        ->when($filter->filled('bus_number'), function ($query) use ($filter) {
            $query->whereHas('bus.busAttribute', function ($subQuery) use ($filter) {
                $subQuery->where('bus_number', $filter->input('bus_number'));
            });
        })
        ->with(['bus.busAttribute', 'bus.user']);

         if ($paginate == true) {
            $data = $data->paginate(10);
        } else {
            $data = $data->get();
        }

    return $data;
}


}