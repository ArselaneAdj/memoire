<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Evaluations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-6">
                    <!-- Evaluation Table -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Nom</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Email</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Télécharger</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evals as $eval)
                                <tr class="border-b hover:bg-gray-50">
                                    <!-- Name -->
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-800">{{ $eval->name }}</td>
                                    <!-- Email -->
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $eval->email }}</td>
                                    <!-- Download Link -->
                                    <td class="py-4 px-6 text-sm">
                                        <a href="{{ Storage::url($eval->file_path) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                                            Cliquez pour télécharger
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Form for New Notes -->
                    <h1>Charger les notes:</h1>
                    <div class="bg-gray-50 p-6 rounded-md shadow-sm">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('notes.store') }}">
                            @csrf

                            <!-- Course Selection -->
                            <div class="mb-4">
                                <label for="cour" class="block text-lg font-medium text-gray-700">Cours :</label>
                                <select required name="cour" id="cour" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option  value="" disabled selected>Choisir un cours</option>
                                    @foreach($cat as $ca)
                                        <option value="{{ $ca->title }}">{{ $ca->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- File Upload -->
                            <div class="mb-4">
                                <label for="file" class="block text-lg font-medium text-gray-700">Choisir un fichier :</label>
                                <input required type="file" name="file" id="file" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-blue font-semibold text-lg rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-200">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
