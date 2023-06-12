<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\PhoneNumbers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeNumbers>
 */
class EmployeeNumbersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomElement(Employee::get())->id,
            'phone_number_id' => $this->faker->randomElement(PhoneNumbers::get())->id
        ];
    }
}
