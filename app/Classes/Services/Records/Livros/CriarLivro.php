<?php
declare(strict_types=1);

namespace App\Classes\Services\Records\Livros;

use App\Classes\Dto\LivroDto;
use App\Classes\Services\Records\SaveRecord;
use App\Models\Livros;

class CriarLivro extends SaveRecord
{
    public function save(LivroDto $dto,Livros $livro)
    {
        $livro->usuario_publicador_id = $dto->getUser();
        $livro->titulo = $dto->titulo;
        
        return $this->execute($livro);
    }
}
