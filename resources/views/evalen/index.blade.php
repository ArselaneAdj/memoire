<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluations') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <br /><br />
                            @foreach($evals as $eval)
                                <div>
                                    <div><h1>{{ $eval->name }}</h1></div>
                                    <div><h2>{{ $eval->email }}</h2></div>
                                    <a href="{{ Storage::url($eval->file_path) }}">Clicker pour telecharger l'evaluation</a>                                
                                </div>
                            @endforeach
                            <form method="POST" enctype="multipart/form-data" action="{{ route('notes.store') }}"> 
                                @csrf
         
                                <div>
                                    <div>
                                        <label for="cour">Cour:</label>
                                    </div>
                                    <input type="text" name="cour" id="cour" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                                    <div>
                                        <label for="file">Choose File:</label>
                                        <input type="file" name="file" id="file" required>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"> 
                                        Save
                                    </button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>