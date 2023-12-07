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
        Schema::create('livros', function (Blueprint $table) {
            $table->id()->comment('Identificador único do livro');
            $table->unsignedBigInteger('usuario_publicador_id')
                ->comment('Identificador único da tabela usuários');
            $table->string('titulo')->comment('Título do livro');
            $table->timestamps();
            $table->softDeletes()->comment('Momemto da remoção do livro');

            $table->foreign('usuario_publicador_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
