<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Livro>
 */
class LivroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome'  => fake()->sentence(3, false),
            'autor' => fake()->name(),
            'isbn'  => fake()->isbn13(),
        ];
    }
}
