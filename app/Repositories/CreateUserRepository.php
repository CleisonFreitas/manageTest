<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Classes\Dto\UserDto;
use App\Classes\Services\Records\User\CreateUser;
use App\Classes\Services\Validations\UserServiceValidation;
use App\Http\Resources\UserResource;
use App\Interfaces\CreateUserContract;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserRepository implements CreateUserContract
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        private CreateUser $createUser,
        private User $user,
        private UserServiceValidation $userValidation
    ) {

    }

    /**
     * @param  array  $data;
     * @return JsonResource;
     */
    public function createUser(array $data): JsonResponse
    {
        try {
            $this->userValidation->validateUserData($data);

            $dataObject = new UserDto(
                $data['name'],
                $data['email'],
                $data['password'],
            );
            $user = $this->createUser->save($dataObject, $this->user);

            $resource = new UserResource($user);

            return response()->json($resource, 201);
        } catch (ValidationException $ex) {
            return response()->json(['errors' => $ex->validator->errors()], 422);
        }
    }
}
