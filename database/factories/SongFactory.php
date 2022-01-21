<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uri' => 'https://source.unsplash.com/random',
            'name' => $this->faker->sentence(rand(1, 5)),
            'description' => $this->faker->text(50),
            'genre' => $this->faker->randomElement(
                array(
                    'Progressive Metal',
                    'Hard Rock',
                    'Fusion'
                )
            )
        ];
    }
}
