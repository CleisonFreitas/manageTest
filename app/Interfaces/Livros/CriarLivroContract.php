<?php

declare(strict_types=1);

namespace App\Interfaces\Livros;

use Illuminate\Http\JsonResponse;

interface CriarLivroContract
{
    public function store(array $data): JsonResponse;
}
