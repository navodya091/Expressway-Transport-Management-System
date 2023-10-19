<?php

namespace App\Modules\BusManagement\Repositories;

use App\Models\Bus;
use App\Models\User;
use App\Models\BusAttribute;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\UserType;

class BusRepository
{
    public function getAll($perPage = 10)
    {
        return Bus::with('busAttribute')->paginate($perPage);
    }

    public function getById($id)
    {
        return Bus::with('busAttribute')->where('id',$id)->first();
    }

    public function createData($data)
    {
        DB::beginTransaction();
        try {
            // Create a new bus record
            $bus = Bus::create([
                'bus_number' => $data['bus_number'],
                'driver_id' => $data['driver_id'],
            ]);
           
            // Create a new bus_attribute record
            $attribute = BusAttribute::create([
                'bus_id' => $bus->id,
                'manufacturer' => $data['manufacturer'],
                'year_of_manufacture' => $data['manufacture_year'],
                'seating_capacity' => $data['seating_capacity'],
                'ac' => $data['ac'],
                'insurance_expireDate' => $data['insurance_expire_date'],
                'fuel_type' => $data['fuel_type'],
            ]);

            if($attribute){
                $bus->bus_attribute_id = $attribute->id;
                $bus->save();
            }
            
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


    public function updateData($data, $id)
    {
        DB::beginTransaction();
        try {
            // Find the bus record by ID and update
            Bus::findOrFail($id)->update([
                'bus_number' => $data['bus_number'],
                'driver_id' => $data['driver_id'],
            ]);

            // Find the bus_attribute record by bus_id and update
            $busAttribute = BusAttribute::where('bus_id', $id)->firstOrFail();
            $busAttribute->update([
                'manufacturer' => $data['manufacturer'],
                'year_of_manufacture' => $data['manufacture_year'],
                'seating_capacity' => $data['seating_capacity'],
                'ac' => $data['ac'],
                'insurance_expireDate' => $data['insurance_expire_date'],
                'fuel_type' => $data['fuel_type'],
            ]);

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



    public function getAllBusDrivers()
    {
        return User::where('user_type_id',UserType::USER_TYPE_DRIVER)->get();
    }
    

    public function updateBusStatus($data)
    {
        DB::beginTransaction();
        try {
            $busId = $data['busId'];
            $newStatus = $data['newStatus'];
       
            // Update the bus status in the database
            $bus = Bus::find($busId);
            $bus->status = $newStatus;
            $bus->save();
         
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

    public function deleteData($id)
    {
        DB::beginTransaction();
        try {

            $bus = Bus::find($id);

            if (!$bus) {
                return ['success' => false];
            }
    
            $bus->delete();
         
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