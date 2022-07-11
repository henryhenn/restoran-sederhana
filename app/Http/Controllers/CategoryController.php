<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return inertia('Category');
    }

    public function store(Request $request)
    {
        $name = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create($name);
        
        return redirect()->route('category_store')->with('message', 'Kategori berhasil dibuat');
    }
}
