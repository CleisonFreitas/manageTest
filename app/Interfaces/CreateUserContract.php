<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface CreateUserContract
{
    public function createUser(array $data): JsonResponse;
}
