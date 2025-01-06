<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours pour etudiants') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            @foreach($posts as $post)
                                        <a href="{{ route('posts.show', $post->id) }}">
                                        <div>
                                            <h1>{{ $post->title }}</h1>
                                            <h1>{{ $post->text }}</h1>
                                            <h1>{{ $post->category->name }}</h1>
                                        </div>
                                    </a>
                                    
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>