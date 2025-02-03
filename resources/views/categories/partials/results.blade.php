<table class="min-w-full table-auto border-collapse border border-gray-200 rounded-md">

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
                        <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">Editer</a>
                        <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800 transition duration-300">Supprimer</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>