<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'bus_number' => 'required|string|max:255',
            'driver_id' => 'required|exists:users,id',
            'ac' => 'required|in:0,1',
            'manufacturer' => 'required|string|max:255',
            'manufacture_year' => 'required|integer',
            'seating_capacity' => 'required|integer',
            'insurance_expire_date' => 'required|date',
            'fuel_type' => 'required|in:diesel,super_diesel',
        ];
    }
}
