<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('etudiants pour enseigniants') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            <table> 
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($etudiants as $etudiant)
                                    <tr>
                                            <td>{{ $etudiant->name }}</td>
                                            <td>{{ $etudiant->email }}</td>
                                            <td>{{ $etudiant->adresse }}</td>
                                            <td>{{ $etudiant->role }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>