<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> <!-- Centered with a max-width of 4xl -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($notes as $note)
                    <div class="bg-white p-6 shadow-lg rounded-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                        <div class="text-lg font-bold text-gray-800">{{ $note->cour }}</div>
                        <a href="{{ Storage::url($note->file_path) }}" 
                           class="block mt-4 text-indigo-600 hover:text-indigo-800 text-sm">
                            Cliquez pour télécharger les notes
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
