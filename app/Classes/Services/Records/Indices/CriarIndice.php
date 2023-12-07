<?php
declare(strict_types=1);

namespace App\Classes\Services\Records\Indices;

use App\Classes\Dto\IndiceDto;
use App\Classes\Services\Records\SaveRecord;
use App\Models\Indices;

class CriarIndice extends SaveRecord
{
    public function save(IndiceDto $dto,Indices $indice)
    {
        $indice->titulo = $dto->titulo;
        $indice->pagina = $dto->pagina;
        $indice->livro_id = $dto->livro_id;
        $indice->indice_pai_id = $dto->indice_pai_id;
        
        return $this->execute($indice);
    }
}
