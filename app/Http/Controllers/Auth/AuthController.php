<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Services\Containers\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $auth
    ) {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        return $this->auth->login($request);
    }
}
