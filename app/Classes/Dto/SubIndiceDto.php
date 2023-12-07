<?php

declare(strict_types=1);

namespace App\Classes\Dto;


class SubIndiceDto
{
    public function __construct(
        public string $titulo,
        public int $pagina,
        public string $livro_id,
        public int $indice_pai_id
    ) {
    }
}
