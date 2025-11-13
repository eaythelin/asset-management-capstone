<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function getCategories(){
        $categories = Category::paginate(5);
        $columns = ["", "Category Name", "Description", "Actions"];
        return view('pages.categories', compact('categories', "columns"));
    }

    public function storeCategory(Request $request){
        $validated = $request->validate([
            "name" => ["required", "string", "max:100", "unique:categories,name"],
            "description" => ["nullable","string", "max:255"]
        ]);

        Category::create($validated);

        return back()->with('success', 'New Category successfully created!');
    }

    public function updateCategory(){

    }

    public function deleteCategory(){

    }
}
