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
        Schema::create('telefone', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->string('descricao', 45)->nullable();
            $table->string('numero', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('aluno_id')->references('id')->on('aluno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('telefone');
    }
};
