<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Aluno;
use App\Models\Telefone;
use App\Models\Emprestimo;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        // Criar 10 livros
        Livro::factory(10)->create();

        // Criar 10 alunos com 3 telefones para o primeiro
        $aluno1 = Aluno::factory()->create();
        $alunos = Aluno::factory(9)->create();
        Telefone::factory(3)->create(['aluno_id' => $aluno1->id]);

        // Criar 10 empréstimos
        Emprestimo::factory(10)->create();
    }
}
