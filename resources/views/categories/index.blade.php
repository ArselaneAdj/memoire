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
                    @if (auth()->check() && (auth()->user()->role === 'admin'))
                        <a href="{{ route('categories.create') }}" class="btn btn-primary text-white mb-6">
                            Ajouter un utilisateur
                        </a>
                    @endif
<br>
                    <!-- Your search input field with AJAX -->
                    <label for="query">Rechercher un utilisateur</label><br>
                    <input type="text" id="searchQuery" name="query" placeholder="Search..." required class="border p-2">
                    
                    <!-- Display the results here -->
                    <div id="results">
                        <!-- Results will be updated here -->
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#searchQuery').on('input', function() {
                                let query = $(this).val(); // Get the current value of the input field

                                if (query === '') {
                                    // If the input field is empty, clear the results
                                    $('#results').html('');
                                } else {
                                    // Make an AJAX request to update results with every character typed
                                    $.ajax({
                                        url: "{{ route('search') }}", // Ensure this route points to your search method
                                        method: "GET",
                                        data: { query: query },
                                        success: function(response) {
                                            // Update the results section with the new content
                                            $('#searchResults').html(response); // You will return the HTML content for results from the controller
                                        }
                                    });
                                }
                            });
                        });

                    </script>

                    
                    <!-- Table for displaying search results -->
                    <table class="min-w-full table-auto border-collapse border border-gray-200 rounded-md">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Nom</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Prenom</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Email</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Adresse</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Role</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Date de naissance</th>
                                <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Numero de telephone</th>
                                @if (auth()->check() && (auth()->user()->role === 'admin'))
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            <!-- The search results will be dynamically inserted here -->
                            @foreach($categories as $category)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-800 border-b border-gray-300">{{ $category->name }}</td>
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-800 border-b border-gray-300">{{ $category->prenom }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->email }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->adresse }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->role }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->birthdate }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 border-b border-gray-300">{{ $category->number }}</td>
                                    @if (auth()->check() && (auth()->user()->role === 'admin'))
                                        <td class="py-4 px-6 text-sm text-indigo-600 border-b border-gray-300 space-x-4">
                                            <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">Edit</a>
                                            <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800 transition duration-300">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
