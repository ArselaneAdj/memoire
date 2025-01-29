<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Fetch categories matching the query
        $categories = Category::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('role', 'like', '%' . $query . '%')
            ->orWhere('adresse', 'like', '%' . $query . '%')
            ->orWhere('birthdate', 'like', '%' . $query . '%')
            ->orWhere('number', 'like', '%' . $query . '%')
            ->orWhere('prenom', 'like', '%' . $query . '%')
            ->get();

        // Check if the request is AJAX
        if ($request->ajax()) {
            // Return only the results part of the view (for AJAX request)
            return view('categories.partials.results', compact('categories'));
        }

        // Return the full page for regular request
        return view('categories.index', compact('categories'));
    }
}
