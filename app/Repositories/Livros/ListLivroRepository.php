<?php

namespace App\Repositories\Livros;

use App\Interfaces\ListLivrosContract;
use App\Models\Livros;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListLivroRepository implements ListLivrosContract
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        private Livros $livros
    )
    {
        //
    }

    public function index(): JsonResponse
    {
        try{
            $dados = $this->livros->getRecords();
            return response()->json($dados,200);
        }catch(\Exception $ex) {
            return response()->json($ex->getMessage(),404);
        }
    }
}
