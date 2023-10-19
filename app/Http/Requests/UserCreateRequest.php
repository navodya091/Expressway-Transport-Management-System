<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can set authorization rules if needed
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10|numeric|unique:users,phone',
            'nic' => ['required','regex:/^(?:\d{9}[xXvV]|\d{12})$/'],
            'password' => 'required|string|min:8',
            'user_type' => 'required', 
        ];
    }
}
