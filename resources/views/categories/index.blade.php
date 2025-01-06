<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisaturs') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}">Ajouter un utilisateur</a>
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->email }}</td>
                                    <td>{{ $category->adresse }}</td>
                                    <td>{{ $category->role }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category) }}">Edit</a>
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}"> 
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
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