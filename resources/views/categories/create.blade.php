<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un utilisateur') }}
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
                    <form method="POST" action="{{ route('categories.store') }}"> 
                        @csrf
 
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="name">Nom:</label>
                                <input required  type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="prenom">Prenom:</label>
                                <input required  type="text" name="prenom" id="pernom" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">Email:</label>
                                <input required  type="email" name="email" id="email" class="form-control"> 

                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password">mot de passe:</label>
                                <input required  type="password" name="password" id="password" class="form-control">
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="adresse">Adresse:</label>
                                <input required  type="text" name="adresse" id="adresse" class="form-control">

                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="birthdate">Date de naissance</label>
                                <input required  type="date" name="birthdate" id="birthdate" class="form-control">

                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="number">Numero de telephone</label>
                                <input required  type="text" name="number" id="number" class="form-control">

                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="role">Role:</label>
                                <select required name="role" id="role" >
                                    <option value="">-- Choose a Role --</option>
                                    <option value="etudiant">Etudiant</option>
                                    <option value="admin">Admin</option>
                                    <option value="enseignant">Enseigniant</option>
                                </select>                            </div>
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