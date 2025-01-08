<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <br /><br />
                            @foreach($notes as $note)
                                <div>
                                    <div><h1>{{ $note->cour }}</h1></div>
                                    <a href="{{ Storage::url($note->file_path) }}">Clicker pour telecharger les notes</a>                                
                                </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>