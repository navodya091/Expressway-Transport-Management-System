<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can set authorization rules if needed
    }

    public function rules()
    {
        return [
            'route_number' => 'required|max:255',
            'description' => 'required|max:255',
            'start_inbound' => 'required|integer|exists:cities,id',
            'end_inbound' => 'required|integer|exists:cities,id',
            'start_outbound' => 'required|integer|exists:cities,id',
            'end_outbound' => 'required|integer|exists:cities,id',

        ];
    }
}
