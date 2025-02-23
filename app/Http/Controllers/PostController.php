<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Notifications\OrderShipped;
use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')->get(); 
 
        return view('posts.index', compact('posts'));
    }

 
    public function create()
    {
        $categories = Category::where('role', 'enseignant')->get();
 
        return view('posts.create', compact('categories'));
    }
 




    public function store(StorePostRequest $request) 

    {
        $data = $request->validated();

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $randomId = rand(0000000,9999999);

        $filExtions  = $file->getClientOriginalName();
        $fileName = $randomId . '-' . time() . $filExtions;
        $filePath = $file->storeAs('storage/uploads', $fileName, 'public');
        $data['file_path'] = $filePath;

    }
        // dd($data);
        Post::create($data); 
        return redirect()->route('posts.index');
    }
 




    
    public function show($id)
    {
        $post = Post::findOrFail($id); // Assuming you have a Title model
        return view('posts.show', compact('post'));
        
    }
 
    public function edit(Post $post)
    {
        $categories = Category::all();
 
        return view('posts.edit', compact('post', 'categories'));
    }
 
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);
        

        $user = Auth::user(); // Get the authenticated user
        $user->notify(new OrderShipped());

 
        return redirect()->route('posts.index');
    }
 
    public function destroy(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index');
    }

    
}