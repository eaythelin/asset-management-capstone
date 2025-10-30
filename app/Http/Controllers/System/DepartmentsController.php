<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Validation\Rule;

class DepartmentsController extends Controller
{
    //
    public function getDepartments(){
        $departments = Department::latest()->paginate(5);
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

    public function updateDepartment(Request $request, $id){
        //rule is: This name must be unique, except for the department that is currently being edited
        $validated = $request->validate([
            "department_name"=>["required", "string", Rule::unique('departments', 'department_name')->ignore($id), "max:100"],
            "description"=>["nullable","string", "max:255"]
        ]);

        $department = Department::findOrFail($id);
        $department->update($validated);

        return redirect()->route('showDepartments')->with('success', 'Department edited successfully!');
    }

    public function deleteDepartment($id){
        //throws 404 error if ID doesnt exist
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('showDepartments')->with('success', 'Department deleted successfully!');
    }
}
