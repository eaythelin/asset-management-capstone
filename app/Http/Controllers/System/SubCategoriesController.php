<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function getSubCategories(Request $request){
        $query = SubCategory::with(['category']);
        if(request('search')){
            $search = $request->input("search");
            $query->search($search);
        }
        
        $subCategories = $query->paginate(5);
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $columns = ["", "Subcategory", "Category", "Description", "Actions"];
        return view('pages.sub-categories', compact('subCategories', 'columns', 'categories'));
    }

    public function storeSubCategory(Request $request){
        $validated = $request->validate([
            'name' => ["required", "max:100", "string"],
            'category_id' => ["required", "exists:categories,id"],
            'description' => ["nullable", "max:255", "string"],
        ]);

        SubCategory::create($validated);

        return back()->with('success', 'Subcategory successfully created!');
    }

    public function updateSubCategory(Request $request, $id){
        
    }

    public function deleteSubCategory($id){
        
    }
}
