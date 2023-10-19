<?php

namespace App\Modules\TripManagement\Repositories;

use App\Models\Trip;
use App\Models\Bus;
use Carbon\Carbon;
use App\Models\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class TripRepository
{
    public function getAll($perPage = 10)
    {
        return Trip::with('bus')->paginate($perPage);
    }

    public function getAllBusses()
    {
        return Bus::where('status',Bus::ACTIVE_BUS)->get();
    }

    public function createData($data)
    {
        DB::beginTransaction();
        try {
            // Create a new trip record

            if($data['route_id'] != null && ( $data['inbound_bus_id'] != null && $data['inbound_arrival_time'] != null && $data['inbound_departure_time'] != null )){
               
                $trip = Trip::create([
                    'route_id' => $data['route_id'],
                    'bus_id' => $data['inbound_bus_id'],
                    'direction' => 'Inbound',
                    'departure_time' => Carbon::parse($data['inbound_arrival_time']),
                    'arrival_time' => Carbon::parse($data['inbound_departure_time']),
                ]);
            
            }if($data['route_id'] != null && ($data['outbound_bus_id'] != null && $data['outbound_arrival_time'] != null && $data['outbound_departure_time'] != null)){
                $trip = Trip::create([
                    'route_id' => $data['route_id'],
                    'bus_id' => $data['outbound_bus_id'],
                    'direction' => 'Outbound',
                    'departure_time' => Carbon::parse($data['outbound_arrival_time']),
                    'arrival_time' => Carbon::parse($data['outbound_departure_time']),
                ]);
            }
            
            if($data['route_id']){ 
                $route = Route::find($data['route_id']);
            }else{
                $route = null;
            }
           
            // Return a success response
            DB::commit();
            return ['success' => true, 'route' => $route] ;
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            Log::error($e->getMessage()); // Log the exception for debugging
            return ['success' => false];
        }
    }

    public function updateData($data, $id)
    {
        DB::beginTransaction();
        try {
            // Check if the route_id exists in the data
            if ($data['route_id']) {
                // Find the route by ID
                $route = Route::find($data['route_id']);
            } else {
                $route = null;
            }

            // Update the trip records based on their direction (Inbound or Outbound)
            if ($data['inbound_bus_id'] && $data['inbound_arrival_time'] && $data['inbound_departure_time']) {
                $inboundTrip = Trip::find($id);

                if ($inboundTrip) {
                    $inboundTrip->update([
                        'route_id' => $data['route_id'],
                        'bus_id' => $data['inbound_bus_id'],
                        'direction' => 'Inbound',
                        'departure_time' => Carbon::parse($data['inbound_arrival_time']),
                        'arrival_time' => Carbon::parse($data['inbound_departure_time']),
                    ]);
                }
            }

            if ($data['outbound_bus_id'] && $data['outbound_arrival_time'] && $data['outbound_departure_time']) {
                $outboundTrip = Trip::find($id);

                if ($outboundTrip) {
                    $outboundTrip->update([
                        'route_id' => $data['route_id'],
                        'bus_id' => $data['outbound_bus_id'],
                        'direction' => 'Outbound',
                        'departure_time' => Carbon::parse($data['outbound_arrival_time']),
                        'arrival_time' => Carbon::parse($data['outbound_departure_time']),
                    ]);
                }
            }

            // Return a success response
            DB::commit();
            return ['success' => true, 'route' => $route];
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            Log::error($e->getMessage()); // Log the exception for debugging
            return ['success' => false];
        }
    }

    

    public function updateTripStatus($data)
    {
        DB::beginTransaction();
        try {
            $tripId = $data['tripId'];
            $newStatus = $data['newStatus'];
       
            // Update the trip status in the database
            $route = Trip::find($tripId);
            $route->status = $newStatus;
            $route->save();
         
            // Return a success response
            DB::commit();
            return ['success' => true];
        } catch (\Exception $e) {
            // Handle the exception 
            DB::rollBack();
            Log::error($e->getMessage()); // Log the exception for debugging
            return ['success' => false];
        }
    }
}