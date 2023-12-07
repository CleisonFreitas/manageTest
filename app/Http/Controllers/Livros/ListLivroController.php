<?php

namespace App\Http\Controllers\Livros;

use App\Classes\Services\Containers\LivroServiceContainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListLivroController extends Controller
{
    public function __construct(
        private LivroServiceContainer $livroServiceContainer
    ) {
    }

    /**
     * @return JsonResponse;
     */
    public function index()
    {
        return $this->livroServiceContainer->index();
    }
}
