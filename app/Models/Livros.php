<?php

namespace App\Models;

use App\Http\Resources\LivroResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livros extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'livros';

    public $timestamps = true;

    /**
     * @return BelongsTo;
     */
    public function usuario_publicador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_publicador_id');
    }

    /**
     * @return BelongsTo;
     */
    public function indices(): HasMany
    {
        return $this->hasMany(Indices::class, 'livro_id');
    }

    public function getRecords()
    {
        $livroQuery = Self::query();

        $titulo = request()->input('titulo') ?? '';
        $tituloIndice = request()->input('titulo_do_indice');

        $livroQuery->where('titulo', 'like', '%' . $titulo . '%');

        if ($tituloIndice) {
            $livroQuery->orWhereHas('indices', function ($query) use ($tituloIndice) {
                $query->where('titulo', 'like', '%' . $tituloIndice . '%');
            });
        }

        $livros = $livroQuery->get();

        return LivroResource::collection($livros);
    }
}
