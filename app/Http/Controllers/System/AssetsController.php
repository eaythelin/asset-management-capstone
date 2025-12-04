<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\SubCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;
use App\Models\Category;

class AssetsController extends Controller
{
    public function getAssets(){

        $role = auth()->user()->getRoleNames()->first();

        $desc = $role === "System Supervisor" ? "View and manage assets" : "View assets information";

        $assets = Asset::with(['category', 'custodian', 'department', 'subCategory', 'supplier'])->paginate(5);
        $columns = ["Asset Code", "Asset Name", "Serial Name","Department", "Custodian", "Category", "Status", "Actions"];

        return view('pages.assets.index-assets', compact('desc', 'assets', 'columns'));
    }

    public function getAsset(){
        return view('pages.assets.show-asset');
    }

    public function getCreateAsset(){
        //gets the latest asset id and add 1, if it doesnt exist default to AST-1
        $latestAsset = Asset::latest('id')->first();
        $nextCode = $latestAsset ? 'AST-' . ($latestAsset->id + 1): 'AST-1';
        
        $categories = Category::orderBy('name')->get();
        $departments = Department::orderBy('name')->pluck('name', 'id');
        $employees = Employee::select('id', 'first_name', 'last_name')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        $employees = $employees->mapWithKeys(function ($employee) {
                return [$employee->id => $employee->first_name . ' ' . $employee->last_name];
        });

        $suppliers = Supplier::orderBy('name')->pluck('name', 'id');

        return view('pages.assets.create-asset', compact('nextCode', 'categories', 'departments'
                                                                    , 'employees', 'suppliers'));
    }

    public function getSubcategories(Category $category){
        return response()->json($category->subCategories);
    }
}
