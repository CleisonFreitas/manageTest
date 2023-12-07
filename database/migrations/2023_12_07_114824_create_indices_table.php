<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indices', function (Blueprint $table) {
            $table->id()
                ->comment('Identificador único da tabela índices');
            $table->unsignedBigInteger('livro_id')
                ->comment('Identificador único da tabela livros');

            $table->unsignedBigInteger('indice_pai_id')
                ->comment('Identificador único da tabela livros')
                ->nullable();
            $table->string('titulo')->comment('Título de índice');
            $table->smallInteger('pagina')->comment('Número da página');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('livro_id')->references('id')->on('livros');
            $table->foreign('indice_pai_id')->references('id')->on('indices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indices');
    }
};
