<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}" class="inline-flex items-center px-6 py-2 bg-indigo-600 text-black rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 mb-6">
                        Ajouter un utilisateur
                    </a>
                    <table class="min-w-full table-auto border-collapse border border-gray-200 rounded-md">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Nom</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Email</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Adresse</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Role</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-800 border-b border-gray-300">{{ $category->name }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->email }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->adresse }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->role }}</td>
                                    <td class="py-4 px-6 text-sm text-indigo-600 border-b border-gray-300 space-x-4">
                                        <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">Edit</a>
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800 transition duration-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
