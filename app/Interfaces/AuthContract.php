<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface AuthContract
{
    public function login(Request $request): JsonResponse;
}
