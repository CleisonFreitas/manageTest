<?php

declare(strict_types=1);

namespace App\Repositories\Livros;

use App\Classes\Dto\IndiceDto;
use App\Classes\Dto\LivroDto;
use App\Classes\Dto\SubIndiceDto;
use App\Classes\Services\Records\Indices\CriarIndice;
use App\Classes\Services\Records\Indices\CriarSubIndice;
use App\Classes\Services\Records\Livros\CriarLivro;
use App\Classes\Services\Validations\LivroServiceValidation;
use App\Http\Resources\LivroResource;
use App\Interfaces\Livros\CriarLivroContract;
use App\Models\Indices;
use App\Models\Livros;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CriarLivroRepository implements CriarLivroContract
{
    public function __construct(
        private Livros $livro,
        private Indices $indice,
        private LivroServiceValidation $livroServiceValidation,
        private CriarLivro $criarLivro,
        private CriarIndice $criarIndice
    ) {
    }

    /**
     * @param  array  $data;
     * @return JsonResponse;
     */
    public function store(array $data): JsonResponse
    {
        try {
            $this->livroServiceValidation->LivroDataValidation($data);

            $dataObject = new LivroDto(
                $data['titulo']
            );

            $livro = $this->criarLivro->save($dataObject,$this->livro);

            $this->storeIndex($data, $livro);
            $resource = new LivroResource($livro);

            return response()->json($resource, 201);
        } catch (ValidationException $ex) {
            return response()->json(['errors' => $ex->validator->errors()], 422);
        }
    }

    /**
     * @param array $data;
     * @param Livros $livro;
     * @return void;
     */
    private function storeIndex(array $data, Livros $livro): void
    {
        $indices = new Collection($data['indices']);
        
        $indices->each(function($query) use($livro) {
            $indiceObject = new IndiceDto(
                $query['titulo'],
                (int)$query['pagina'],
                $livro['id'],
                null
            );

            $indice = $this->criarIndice->save($indiceObject, $this->indice);

            if(isset($query['subindices'])) {
                $this->storeSubIndex($query['subindices'],$indice);
            }
        });
    }

    /**
     * @param array $data;
     * @param Indices $indice;
     */
    private function storeSubIndex(array $data, Indices $indice)
    {
        $subindices = new Collection($data);
        
        $subindices->each(function($query) use($indice) {

            $indiceObject = new IndiceDto(
                $query['titulo'],
                (int)$query['pagina'],
                $indice->livro_id,
                $indice->id,
            );

            $subindice = $this->criarIndice->save($indiceObject, New Indices);

            if(isset($query['subindices'])) {
                return $this->storeSubIndex($query,$subindice);
            }
        });
    }
}
