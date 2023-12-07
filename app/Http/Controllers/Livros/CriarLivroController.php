<?php

namespace App\Http\Controllers\Livros;

use App\Classes\Services\Containers\LivroServiceContainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CriarLivroController extends Controller
{
    public function __construct(
        private LivroServiceContainer $livroServiceContainer
    ) {
    }

    public function store(Request $request): JsonResponse
    {
        return $this->livroServiceContainer->store($request->all());
    }
}
