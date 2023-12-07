<?php

declare(strict_types=1);

namespace App\Classes\Services\Validations;

use Illuminate\Support\Facades\Validator;

class LivroServiceValidation
{
    public function LivroDataValidation(array $data)
    {
        return Validator::make($data, [
            'titulo' => ['required', 'max:255', 'string'],
            'indices' => ['required', 'array'],
            'indices.*.titulo' => ['required', 'string'],
            'indices.*.pagina' => ['required', 'numeric'],
            'indices.*.subindices' => ['array'],
            'indices.*.subindices.*.titulo' => ['required', 'string'],
            'indices.*.subindices.*.pagina' => ['required', 'numeric'],
            'indices.*.subindices.*.subindices' => ['array'],
            'indices.*.subindices.*.subindices.*.titulo' => ['required', 'string'],
            'indices.*.subindices.*.subindices.*.pagina' => ['required', 'numeric'],
        ])->validate();
    }
}
