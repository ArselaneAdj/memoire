<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StoreCategoryRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     
    public function index()
    {
        $categories = Category::all(); 
 
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        
        Category::create([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'adresse' => $request->input('adresse'),
            'role' => $request->input('role'),
            'birthdate' => $request->input('birthdate'),
            'number' => $request->input('number')


        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'adresse' => $request->input('adresse'),
            'role' => $request->input('role'),
            'birthdate' => $request->input('birthdate'),
            'number' => $request->input('number')


        ]);
 
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'adresse' => $request->input('adresse'),
            'number' => $request->input('number'),
            'role' => $request->input('role')
        ]);
        return redirect()->route('categories.index'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, User $user)
    {
        $category->delete();
        $user->delete();

        return redirect()->route('categories.index');
    }

    
}
