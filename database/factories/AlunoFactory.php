<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aluno>
 */
class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome'      => fake()->name(),
            'matricula' => fake()->bothify('##########??'),
            'endereco'  => fake()->address(),
        ];
    }
}
