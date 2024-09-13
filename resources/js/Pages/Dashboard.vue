<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Les données des sociétés sont passées via Inertia
const props = defineProps({
    companies: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <!-- Boucle sur les sociétés -->
                    <div v-for="company in companies" :key="company.id" class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100"> Company : {{ company.name }}</h3>

                        <!-- Boucle sur les établissements -->
                        <div v-for="establishment in company.establishments" :key="establishment.id" class="mt-4">
                            <h4 class="text-xl font-semibold text-gray-400 dark:text-gray-200"> Establishment : {{ establishment.name }}</h4>

                            <!-- Boucle sur les employés -->
                            <div class="mt-3">
                                <h5 class="font-semibold text-lg">Employés</h5>
                                <ul class="list-disc ml-5 text-gray-900 dark:text-gray-100">
                                    <li v-for="employee in establishment.employees" :key="employee.id">
                                        {{ employee.first_name }} {{ employee.last_name }} ({{ employee.onboarding_status }})

                                        <!-- Boucle sur les contrats -->
                                        <ul class="list-disc ml-5">
                                            <li v-for="contract in employee.contracts" :key="contract.id">
                                                Contrat : {{ contract.contract_type }} - Début : {{ contract.start_date }} - Fin : {{ contract.end_date ? contract.end_date : 'N/A' }}
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
