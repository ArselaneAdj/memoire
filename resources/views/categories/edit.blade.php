<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Edit') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf
                        @method('PUT')
 
                        <div>
                            <div>
                                <label for="name">Nom:</label>
                            </div>
                            <input type="text" name="name" id="name" value="{{$category->name}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <div>
                                <label for="prenom">Prenom:</label>
                            </div>
                            <input type="text" name="prenom" id="prenom" value="{{$category->prenom}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <div>
                                <label for="email">Email:</label>
                            </div>
                            <input type="email" name="email" id="email" value="{{$category->email}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <div>
                                <label for="password">Mote de passe:</label>
                            </div>
                            <input type="password" name="password" id="password" value="{{$category->password}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <div>
                                <label for="adresse">Adresse:</label>
                            </div>
                            <input type="text" name="adresse" id="adresse" value="{{$category->adresse}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <div>
                                <label for="number">Numero de telephone:</label>
                            </div>
                            <input type="text" name="number" id="number" value="{{$category->number}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <div>
                                <label for="role">Role:</label>
                                <select name="role" id="role" required>
                                    <option value="{{$category->role}}">{{$category->role}}</option>
                                    <option value="etudiant">Etudiant</option>
                                    <option value="admin">Admin</option>
                                    <option value="enseignant">Enseigniant</option>
                                </select>                            </div>
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