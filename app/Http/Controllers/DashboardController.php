<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer toutes les sociétés avec leurs établissements, employés et contrats
        $companies = Company::with(['establishments.employees.contracts'])->get();

        return Inertia::render('Dashboard', [
            'companies' => $companies
        ]);
    }
}
