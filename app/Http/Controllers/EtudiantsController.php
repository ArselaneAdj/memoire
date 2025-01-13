<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Category::where('role', 'etudiant')->get();

        return view('etudiants.index', compact('etudiants'));    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate incoming request data
    $request->validate([
        'note' => 'required|string|max:255', // Add your validation rules here
    ]);

    // Store the validated data
    Category::create([
        'note' => $request->input('note'),
    ]);

    // Redirect to the etudiants index page with a success message
    return redirect()->route('etudiants.index')->with('success', 'Category created successfully!');
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
    public function update(Request $request, $id)
{
    $request->validate([
        'note' => 'required|string|max:255',
    ]);

    $etudiant = Category::findOrFail($id);
    $etudiant->update([
        'note' => $request->input('note'),
    ]);

    return redirect()->route('etudiants.index')->with('success', 'Note updated successfully!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
