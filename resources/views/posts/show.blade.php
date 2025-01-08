<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div><h1>{{ $post->title }}</h1></div>
                        <div><h1>{{ $post->text }}</h1></div>
                        <div><h2>{{ $post->category->name }}</h2>
                        <a href="{{ Storage::url($post->file_path) }}">Clicker pour telecharger le coure</a>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>