<?php

namespace App\Http\Controllers\User;

use App\Classes\Services\Containers\UserServiceContainer;
use Illuminate\Http\Request;

class CreateUserController
{
    public function __construct(
        private UserServiceContainer $userServiceContainer,

    ) {
    }

    public function store(Request $request)
    {
        return $this->userServiceContainer->createUser($request->all());

    }
}
