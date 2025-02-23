<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer cour') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any()) 
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                                       
                    <form  enctype="multipart/form-data" method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input required value="{{ old('title') }}" type="text" name="title" id="title" class="form-control" placeholder="entrer titre">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea required value="{{ old('text') }}" name="text" id="text" class="form-control" placeholder="entrer text"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file" class="form-label">Choisi fichier</label>
                                <input required value="{{ old('file') }}" type="file" class="form-control" name="file" id="file" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Enseigniant</label>
                                <select required name="category_id" id="category_id" class="form-select">
                                    <option value="">Choisi enseigniant</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id ==  old('category_id') ? 'selected' : ''  }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        
                        
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>