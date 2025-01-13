<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Étudiants pour enseignants') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Adresse</th>
                                <th class="border border-gray-300 px-4 py-2">Role</th>
                                {{-- <th class="border border-gray-300 px-4 py-2">Note</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etudiants as $etudiant)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $etudiant->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $etudiant->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $etudiant->adresse }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $etudiant->role }}</td>
                                    {{-- <td class="border border-gray-300 px-4 py-2">
                                        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input 
                                                type="text" 
                                                name="note" 
                                                id="note" 
                                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-2 py-1"
                                                value="{{ old('note', $etudiant->note ?? '') }}"
                                            >
                                            <button 
                                                type="submit" 
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            > 
                                                Save
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
