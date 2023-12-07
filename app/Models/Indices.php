<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indices extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'indices';
    public $timestamps = true;


    /**
     * @return HasMany;
     */
    public function subindices(): HasMany
    {
        return $this->hasMany(Self::class, 'indice_pai_id');
    }
}
