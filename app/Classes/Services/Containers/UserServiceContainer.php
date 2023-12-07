<?php

declare(strict_types=1);

namespace App\Classes\Services\Containers;

use App\Interfaces\CreateUserContract;
use Illuminate\Http\JsonResponse;

class UserServiceContainer
{
    public function __construct(
        private CreateUserContract $createUserRepository
    ) {
    }

    /**
     * @return JsonResponse;
     */
    public function createUser(array $data): JsonResponse
    {
        return $this->createUserRepository->createUser($data);
    }
}
