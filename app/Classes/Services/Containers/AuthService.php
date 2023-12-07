<?php

namespace App\Classes\Services\Containers;

use App\Interfaces\AuthContract;
use Illuminate\Http\Request;

class AuthService
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        private AuthContract $authRepository
    ) {
    }

    public function login(Request $request)
    {
        return $this->authRepository->login($request);
    }
}
