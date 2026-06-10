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
        Schema::create('emprestimo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id');
            $table->foreignId('aluno_id');
            $table->datetime('datahora');
            $table->datetime('datahora_devolucao')->nullable();
            $table->timestamps();

            $table->foreign('livro_id')->references('id')->on('livro');
            $table->foreign('aluno_id')->references('id')->on('aluno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('emprestimo');
    }
};
