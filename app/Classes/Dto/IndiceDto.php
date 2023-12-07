<?php

declare(strict_types=1);

namespace App\Classes\Dto;


class IndiceDto
{
    public function __construct(
        public string $titulo,
        public int $pagina,
        public int $livro_id,
        public int|null $indice_pai_id
    ) {
    }
}
