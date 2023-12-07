<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'usuario_publicador' => [
                'name' => $this->usuario_publicador->name,
                'email' => $this->usuario_publicador->email,
            ],
            'indices' => IndiceResource::collection($this->indices)

        ];
    }
}
