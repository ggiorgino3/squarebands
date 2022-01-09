<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->firstName,
            "surname" => $this->faker->lastName,
            "email" => $this->faker->unique()->safeEmail(),
            "phone" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "business_title" => "Manager",
        ];
    }
}
