<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Emprestimo>
 */
class EmprestimoFactory extends Factory
{
    public function definition(): array
    {
        $datahora = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'livro_id'            => Livro::factory(),
            'aluno_id'            => Aluno::factory(),
            'datahora'            => $datahora,
            'datahora_devolucao'  => fake()->boolean(70)
                ? fake()->dateTimeBetween($datahora, 'now')
                : null,
        ];
    }
}
