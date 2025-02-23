<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Statistiques') }} 
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Table for displaying statistics -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-100">
                                <tr class="text-left">
                                    <th class="py-3 px-6 text-sm font-semibold text-gray-700">Nombre d'utilisateurs</th>
                                    <th class="py-3 px-6 text-sm font-semibold text-gray-700">Nombre d'enseigniants</th>
                                    <th class="py-3 px-6 text-sm font-semibold text-gray-700">Nombre d'étudiants</th>
                                    <th class="py-3 px-6 text-sm font-semibold text-gray-700">Nombre d'administrateurs</th>
                                    <th class="py-3 px-6 text-sm font-semibold text-gray-700">Nombre de cours</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-gray-200">
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $count }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $counten }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $countet }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $countad }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-700">{{ $countco }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
