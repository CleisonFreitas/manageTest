<?php

namespace App\Classes\Services\Records\User;

use App\Classes\Dto\UserDto;
use App\Classes\Services\Records\SaveRecord;
use App\Models\User;

class CreateUser extends SaveRecord
{
    public function save(UserDto $dto, User $user)
    {
        $user->name = $dto->getName();
        $user->email = $dto->getEmail();
        $user->password = $dto->getPassword();

        return $this->execute($user);
    }
}
