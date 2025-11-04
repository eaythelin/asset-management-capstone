<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function getEmployees(){
        // Get employees with their department info
        $employees = Employee::with('department')->paginate(5);
        $departments = Department::pluck('department_name', 'id');

        $columns = ["","Name", "Department", "Custodian", "Actions"];
        return view("pages.employees", compact('employees', 'columns', 'departments'));
    }

    public function storeEmployees(Request $request){
        $validated = $request->validate([
            "first_name"=> "required", "max:100",
            "last_name"=> "required", 'max:100',
            "department_id"=> "required", "exists:departments,id"
        ]);

        Employee::create($validated);

        return redirect()->route('employees.show')->with('success', 'Employee successfully created!');
    }

    public function updateEmployee(){
        
    }

    public function deleteEmployee(){
        
    }
}
