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
                    <div class="mb-4">
                        <h1 class="text-3xl font-semibold text-primary mb-2">{{ $post->title }}</h1>
                        <p class="text-lg text-dark mb-4">{{ $post->text }}</p>
                        <h2 class="text-xl text-muted mb-4">{{ $post->category->name }}</h2>
                        <a href="{{ Storage::url($post->file_path) }}" class="btn btn-primary text-white">
                            Clicker pour télécharger le cours
                        </a>
                        <form method="POST" action="{{ route('enroll.store') }}">
                            @csrf
                            <div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Enroll
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
