<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours pour etudiants') }} 
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 mb-4">  <!-- 2 posts per row on medium and larger screens -->
                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                            <div class="card bg-white shadow-sm rounded p-4">
                            
                                <div class="card-body">
                                    
                                        <div class="mb-4">
                                            <h2 class="card-title text-primary text-uppercase">{{ $post->title }}</h2>
                                            <p class="card-text text-dark">
                                                {{ \Illuminate\Support\Str::limit($post->text, 25) }}
                                            </p>
                                            <p class="text-muted">{{ $post->category->name }}</p>
                                        </div>
                                
                                </div>
                            
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    
       

</x-app-layout>