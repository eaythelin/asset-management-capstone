<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    //
    public function getDepartments(){
        $departments = Department::all();
        $columns = ["","Department Name", "Description", "Actions"];
        return view("pages.departments", compact('departments', "columns"));
    }
}
