<?php

namespace App\Http\Controllers;   
use Illuminate\Support\Facades\Auth;
use App\Models\Enroll;
use App\Models\Post;

use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         try {
             // Ensure the required data is present
             $request->validate([
                 'post_id' => 'required|exists:posts,id', // Validate post ID exists in the posts table
             ]);
     
             // Create the enrollment
             Enroll::create([
                 'posts_id' => $request->post_id, // Post ID from the request
                 'categories_id' => Auth::id(), // Current authenticated user's ID
             ]);
     
             // Redirect back with a success message
             return redirect()->back()->with('success', 'Enrollment successful!');
         } catch (\Illuminate\Database\QueryException $e) {
             // Handle database-related errors
             return redirect()->back()->with('error', 'A database error occurred. Please try again.');
         } catch (\Exception $e) {
             // Handle general errors
             return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
         }
     }
     
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
