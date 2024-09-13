<?php

namespace Database\Seeders;

use App\Http\Enums\EmployeeStatus;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Establishment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Gauthier Dewit',
            'email' => 'gauthierdewit@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Company::factory()
            ->count(3)
            ->create()
            ->each(function ($company) {
                Establishment::factory()
                    ->count(2)
                    ->create(['company_id' => $company->id])
                    ->each(function ($establishment) {
                        Employee::factory()
                            ->count(3)
                            ->create(
                                ['onboarding_status' => collect(EmployeeStatus::cases())->random()->name]
                            )
                            ->each(function ($employee) use ($establishment) {
                                Contract::create([
                                    'employee_id' => $employee->id,
                                    'establishment_id' => $establishment->id,
                                    'contract_type' => 'CDI',
                                    'start_date' => now()->subMonths(1),
                                    'end_date' => null,
                                ]);
                            });
                    });
            });
    }

}
