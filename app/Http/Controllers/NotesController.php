<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
            {
                $user = Auth::user(); 

                // Find the record in the database where the user ID matches the current user's ID
                $record = Category::where('id', $user->id)->first(); // Make sure 'id' is the correct column name

                $notes = Notes::all();
                
                // Pass the correct variables to the view
                return view('notes.index', compact('notes', 'record'));  // Use 'record' instead of 'mynote'
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
        $notes = Notes::all();

         // Validate if file is present in the request
         $validatedData = $request->validate([
             'cour' => 'required|string|max:255',
             'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048', // Optional file validation
         ]);
     
         // Handle file upload if it's present
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             
             // Generate a unique file name with the original file extension
             $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
             
             // Store the file in the 'public/uploads/evals' directory and get its path
             $filePath = $file->storeAs('uploads/notes', $fileName, 'public');
             
             // Add the file path to the validated data
             $validatedData['file_path'] = $filePath;
         }
     
         // Store the data into the database
         Notes::create($validatedData);
         
         // Redirect to the 'evalet.create' route with success
         return redirect()->route('notes.index')->with('success', 'Notes created successfully.');
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
