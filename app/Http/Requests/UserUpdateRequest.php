<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'phone' => 'required|digits:10|numeric|unique:users,phone,' .  $this->route('id'),              
            'nic' => ['required', 'regex:/^(?:\d{9}[xXvV]|\d{12})$/'],
            'user_type' => 'required',
        ];
    }
}
