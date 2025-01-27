<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluation') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8"> <!-- Set max-width to 2xl (half the original) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if ($errors->any()) 
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <form method="POST" enctype="multipart/form-data" action="{{ route('evalet.store') }}"> 
                        @csrf
                        <div class="space-y-4">
                            <!-- Champ Nom -->
                            <div>
                                <label for="name" class="block text-lg font-medium text-gray-700">Nom :</label>
                                <input required type="text" name="name" id="name" class="form-control py-2 px-4 mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" >
                            </div>

                            <!-- Champ Email -->
                            <div>
                                <label for="email" class="block text-lg font-medium text-gray-700">Email :</label>
                                <input type="email" name="email" id="email" class="form-control py-2 px-4 mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>

                            <!-- Champ Fichier -->
                            <div>
                                <label for="file" class="block text-lg font-medium text-gray-700">Choisir un fichier :</label>
                                <input type="file" name="file" id="file" class="form-control py-2 px-4 mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>

                            <!-- Bouton Soumettre -->
                            <div>
                                <button type="submit" class="btn btn-primary w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
