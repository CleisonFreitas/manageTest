<?php

declare(strict_types=1);

namespace App\Classes\Dto;

use Illuminate\Support\Facades\Auth;

class LivroDto
{
    public Int $user;

    public function __construct(
        public string $titulo
    ) {
        $this->user = Auth::user()->id;
    }

    /**
     * @return Auth Int;
     */
    public function getUser(): int
    {
        return $this->user;
    }
}
