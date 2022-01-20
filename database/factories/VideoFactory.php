<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            "uri" => "https://mityurl.com/y/TEDT/r",
            "type" => "local",
            "description" => $faker->text,
            "tags" => ""
        ];
    }
}
