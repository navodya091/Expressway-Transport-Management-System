<?php

namespace App\Modules\UserManagement\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\UserType;

class UserRepository
{
    public function getAll($perPage = 10)
    {
        return User::with('userType')->paginate($perPage);
    }

    public function getById($id)
    {
        return User::with('userType')->where('id',$id)->first();
    }

    public function createData($data)
    {
        DB::beginTransaction();
        try {
            // Create a new user record
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'nic' => $data['nic'],
                'password' => Hash::make($data['password']),
                'user_type_id' => $data['user_type'],
            ]);

            if($user){
                // Send an email to the user with their email and password
                Mail::raw("Your email: {$user->email}\nYour password: {$data['password']}", function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Your Account Information');
                });
            }

            //send email with login credentials

            
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
            // Find the user by ID
            $user = User::findOrFail($id);

            // Update the user's information
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->nic = $data['nic'];

            $user->user_type_id = $data['user_type'];
            $user->save();

            // Send an email to the user with their updated information
            Mail::raw("Your profile information has been updated.", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Account Information Updated');
            });

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



    public function getAllUserTypes()
    {
        return UserType::get();
    }
    

    public function updateUserStatus($data)
    {
        DB::beginTransaction();
        try {
            $userId = $data['userId'];
            $newStatus = $data['newStatus'];
       
            // Update the user status in the database
            $user = User::find($userId);
            $user->status = $newStatus;
            $user->save();
         
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