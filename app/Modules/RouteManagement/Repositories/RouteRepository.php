<?php

namespace App\Modules\RouteManagement\Repositories;

use App\Models\Route;
use App\Models\City;
use Illuminate\Support\Facades\Log;


class RouteRepository
{
    public function getAll($perPage = 10)
    {
        return Route::paginate($perPage);
    }

    public function getById($routeId)
    {
        return Route::where('id',$routeId)->first();
    }

    public function getAllCities()
    {
        return City::get();
    }

    public function createDate($data)
    {
        try {
            // Create a new route record
            $route = Route::create([
                'route_number' => $data['route_number'],
                'description' => $data['description'],
                'start_point_outbound' => $data['start_outbound'],
                'end_point_outbound' => $data['end_outbound'],
                'start_point_inbound' => $data['start_inbound'],
                'end_point_inbound' => $data['end_inbound'],
            ]);
         
            
            // Return a success response
            return ['success' => true, 'route' => $route] ;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage()); // Log the exception for debugging
            return ['success' => false];
        }
    }
    

    public function updateRouteStatus($data)
    {
        try {
            $routeId = $data['routeId'];
            $newStatus = $data['newStatus'];
       
            // Update the route status in the database
            $route = Route::find($routeId);
            $route->status = $newStatus;
            $route->save();
         
            // Return a success response
            return ['success' => true];
        } catch (\Exception $e) {
            // Handle the exception 
            dd($e->getMessage());
            Log::error($e->getMessage()); // Log the exception for debugging
            return ['success' => false];
        }
    }
}