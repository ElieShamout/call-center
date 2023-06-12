<?php

namespace Database\Factories;

use App\Models\EmployeeNumbers;
use App\Models\PhoneNumbers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'center_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_id' => $this->faker->unique()->randomElement(EmployeeNumbers::get())->id,
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'id_number' => $this->faker->unique()->numerify('##########'),
            'work' => 'worker',
            'email' => $this->faker->unique()->email(),
        ];
    }
}
