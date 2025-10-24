<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Department;

class DashboardController extends Controller
{
    //
    public function getDashboard(){

        //The Assets per department are hidden if role = Department Head
        $role = Auth::user() -> getRoleNames() -> first();

        $gridNumber = $role === "Department Head" ? "md:grid-cols-2" : "md:grid-cols-3";
        $toggleTable = $role === "Department Head" ? "hidden" : "block";

        //Get Departments
        $departments = Department::all();

        //Column names for Filter Subcategory by Category and Assets per Department
        $subcategoryFilterColumns = ["", "Subcategory", "Count"];
        $assetsPerDepartmentColumns = ["", "Department", "Count"];
        return view("pages.dashboard", compact("gridNumber", "toggleTable", "departments", 
                                                            "subcategoryFilterColumns", "assetsPerDepartmentColumns"));
    }
}
