<?php

declare(strict_types=1);

namespace App\Classes\Services\Containers;

use App\Interfaces\ListLivrosContract;
use App\Interfaces\Livros\CriarLivroContract;
use Illuminate\Http\JsonResponse;

class LivroServiceContainer
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        private CriarLivroContract $criarLivroRepository,
        private ListLivrosContract $listLivroRepository
    ) {
    }

    /**
     * @param array $data;
     * @return JsonResponse;
     */
    public function store(array $data): JsonResponse
    {
        return $this->criarLivroRepository->store($data);
    }

    /**
     * @return JsonResponse;
     */
    public function index(): JsonResponse
    {
        return $this->listLivroRepository->index();
    }
}
