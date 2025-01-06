<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;

use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;
 
class PostController extends Controller
{
    

    public function enroll(Request $request, $courseId)
    {
        // Get the authenticated user
        $user = User::user();

        // Find the course or fail if it doesn't exist
        $course = Post::findOrFail($courseId);

        // Check if the user is already enrolled
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return response()->json(['message' => 'You are already enrolled in this course.'], 400);
        }

        // Enroll the user in the course
        $user->courses()->attach($course->id, ['enrolled_at' => now()]);

        return response()->json(['message' => 'Enrollment successful!']);
    }




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
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        $data['file_path'] = $filePath;
    }
        Post::create($request->validated()); 
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
 
        return redirect()->route('posts.index');
    }
 
    public function destroy(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index');
    }

    
}