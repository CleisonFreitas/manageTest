<?php

declare(strict_types=1);

namespace App\Classes\Dto;

use Illuminate\Support\Facades\Hash;

class UserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,

    ) {
    }

    /**
     * @return String;
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return String;
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return String;
     */
    public function getPassword()
    {
        return Hash::make($this->password);
    }
}
