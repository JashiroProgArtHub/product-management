<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_color' => 'nullable|string|max:50'
        ]);

        Category::create($request->only(['cat_name', 'cat_color']));

        return redirect()->route('categories.index')
            ->with('success', 'Category added successfully');
    }
}