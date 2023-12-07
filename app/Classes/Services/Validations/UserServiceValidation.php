<?php

namespace App\Classes\Services\Validations;

use Illuminate\Support\Facades\Validator;

class UserServiceValidation
{
    public function validateUserData(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ])->validate();
    }
}
