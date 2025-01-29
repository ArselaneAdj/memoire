<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-lg font-semibold text-gray-800 ">
                    {{ __("Bonjour" )  }} {{Auth::user()->name}}
                </div>
            </div>
            @if (auth()->check() && (auth()->user()->role === 'admin'))
                            <!-- Cartes de statistiques -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Utilisateurs totaux</h3>
                        <p class="text-2xl font-bold text-indigo-600">{{ $count }}</p>
                        <p class="text-sm text-gray-500">+{{ $percentage }}% par rapport au mois dernier</p>
                    </div>
                    {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Revenu total</h3>
                        <p class="text-2xl font-bold text-green-600">12 345 $</p>
                        <p class="text-sm text-gray-500">+10% par rapport au mois dernier</p>
                    </div> --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Cours actifs</h3>
                        <p class="text-2xl font-bold text-blue-600">{{ $countco }}</p>
                        <p class="text-sm text-gray-500">+{{ $diff }} par rapport au mois dernier </p>
                    </div>
                    {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">Tâches en attente</h3>
                        <p class="text-2xl font-bold text-red-600">12</p>
                        <p class="text-sm text-gray-500">-3 par rapport à la semaine dernière</p>
                    </div> --}}
                </div>

                <!-- Liens rapides -->
                <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                    <a href="{{ route('categories.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-800">Gérer les utilisateurs</h3>
                        <p class="text-sm text-gray-500">Voir et gérer les comptes utilisateurs</p>
                    </a>
                    <a href="{{ route('posts.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-800">Gérer les cours</h3>
                        <p class="text-sm text-gray-500">Accéder aux cours détaillés et aux enseigniants</p>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-800">Paramètres</h3>
                        <p class="text-sm text-gray-500">Configurer les paramètres du compte</p>
                    </a>
                    <a href="{{ route('posts.create') }}" class=" font-semibold bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 transition duration-300">Create Post</a>
                    <a href="{{ route('categories.create') }}" class="font-semibold bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 transition duration-300">Add User</a>
                </div>
            @endif       
        </div>
    </div>
</x-app-layout>