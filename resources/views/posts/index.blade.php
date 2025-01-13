<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add New Post Button -->
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-6 py-2 bg-indigo-600 text-black rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 mb-6">
                        Ajouter un cour 
                    </a>
                    <!-- Posts List -->
                    @foreach($posts as $post)
                        <div class="bg-gray-50 rounded-lg shadow-sm mb-6 p-4">
                            <a href="{{ route('posts.show', $post) }}">
                                <div class="text-xl font-semibold text-gray-800">{{ $post->title }}</div>
                                <div class="text-sm text-gray-600">{{ Str::limit($post->text, 20, '...') }}</div>
                                <div class="text-sm text-indigo-600">{{ $post->category->name }}</div>
                            </a>
                            <div class="mt-4 flex space-x-4">
                                <!-- Edit Link -->
                                <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">Edit</a>
                                <!-- Delete Form -->
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800 transition duration-300">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
