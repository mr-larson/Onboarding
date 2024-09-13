<?php

namespace Database\Seeders;

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
                // Créer 2 établissements pour chaque société
                Establishment::factory()
                    ->count(2)
                    ->create(['company_id' => $company->id])
                    ->each(function ($establishment) {
                        // Créer 3 employés pour chaque établissement
                        Employee::factory()
                            ->count(3)
                            ->create()
                            ->each(function ($employee) use ($establishment) {
                                // Créer un contrat pour chaque employé dans cet établissement
                                Contract::create([
                                    'employee_id' => $employee->id,
                                    'establishment_id' => $establishment->id,
                                    'contract_type' => 'CDI', // Exemple de type de contrat
                                    'start_date' => now()->subMonths(1), // Exemple de date de début
                                    'end_date' => null, // Pas de date de fin pour un CDI
                                ]);
                            });
                    });
            });
    }

}
