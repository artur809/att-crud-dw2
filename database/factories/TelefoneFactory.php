<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Telefone>
 */
class TelefoneFactory extends Factory
{
    public function definition(): array
    {
        return [
            'aluno_id'  => Aluno::factory(),
            'descricao' => fake()->randomElement(['Celular', 'Residencial', 'Comercial']),
            'numero'    => fake()->phoneNumber(),
        ];
    }
}
