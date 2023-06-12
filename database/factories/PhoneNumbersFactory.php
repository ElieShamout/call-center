<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhoneNumbers>
 */
class PhoneNumbersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr=[5,6,9];
        return [
            'status' => $this->faker->randomElement(['busy','proccessed','reject','out of service']),
            'phone' => $arr[rand(0,2)].substr(str_shuffle("123456789"), 0, 7),
        ];
    }
}
