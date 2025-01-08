<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\StudentEval;
use Illuminate\Http\Request;

class EvaletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('evalet.create');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    
     //Store a newly created resource in storage.
     

     public function store(Request $request) 
     {
         // Validate if file is present in the request
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email',
             'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048', // Optional file validation
         ]);
     
         // Handle file upload if it's present
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             
             // Generate a unique file name with the original file extension
             $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
             
             // Store the file in the 'public/uploads/evals' directory and get its path
             $filePath = $file->storeAs('uploads/evals', $fileName, 'public');
             
             // Add the file path to the validated data
             $validatedData['file_path'] = $filePath;
         }
     
         // Store the data into the database
         StudentEval::create($validatedData);
         
         // Redirect to the 'evalet.create' route with success
         return redirect()->route('evalet.index')->with('success', 'Student evaluation created successfully.');
     }
     


    
     // Display the specified resource.
     
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
