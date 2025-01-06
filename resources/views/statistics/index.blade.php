<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('statistics') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table> 
                        <thead>
                            <tr>
                                <th>Nombre d'utulisateurs</th>
                                <th>Nombre d'enseigniants</th>
                                <th>Nombre d'etudiants</th>
                                <th>Nombre d'admins</th>
                                <th>Nombre de cours</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$counten}}</td>
                                    <td>{{$countet}}</td>
                                    <td>{{$countad}}</td>
                                    <td>{{$countco}}</td>
                                </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>