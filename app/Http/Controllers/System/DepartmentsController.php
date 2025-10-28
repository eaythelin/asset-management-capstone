<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    //
    public function getDepartments(){
        $departments = Department::paginate(5);
        $columns = ["","Department Name", "Description", "Actions"];
        return view("pages.departments", compact('departments', "columns"));
    }

    public function storeDepartments(Request $request){
        $validated = $request->validate([
            "department_name"=>["required", "string","unique:departments,department_name", "max:100"],
            "description"=>["nullable","string", "max:255"]
        ]);
        //create the department if all the rules pass
        Department::create($validated);

        return redirect()->route('showDepartments')->with('success','Department successfully created!');
    }

    public function updateDepartment(Request $request){
        
    }

    public function deleteDepartment(Request $request){
        
    }
}
