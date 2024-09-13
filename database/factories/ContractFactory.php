<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'establishment_id' => Establishment::factory(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
        ];
    }
}
