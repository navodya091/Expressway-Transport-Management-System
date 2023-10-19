<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can set authorization rules if needed
    }

    public function rules()
    {
        return [
            'inbound_arrival_time' => 'nullable',
            'inbound_departure_time' => 'nullable',
            'inbound_assign_bus' => 'nullable|exists:buses,id',
            'outbound_arrival_time' => 'nullable',
            'outbound_departure_time' => 'nullable',
            'outbound_assign_bus' => 'nullable|exists:buses,id',

        ];
    }
}
