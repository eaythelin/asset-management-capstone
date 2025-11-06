<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function getEmployees(Request $request){
        $search = $request->input("search");
        // Get employees with their department info
        $employees = Employee::with('department')->search($search)->paginate(5);
        $departments = Department::pluck('department_name', 'id');

        $columns = ["","Name", "Department", "Custodian", "Actions"];
        return view("pages.employees.index-employees", compact('employees', 'columns', 'departments'));
    }

    public function getEmployee($id){
        $employee = Employee::with('department')->findOrFail($id);

        return view('pages.employees.show-employee', compact('employee'));
    }

    public function storeEmployees(Request $request){
        $validated = $request->validate([
            "first_name"=> ["required", "max:100", "string"],
            "last_name"=> ["required", 'max:100', "string"],
            "department_id"=> ["required", "exists:departments,id"]
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee successfully created!');
    }

    public function updateEmployee(Request $request, $id){
        $validated = $request->validate([
            "first_name"=> ["required", "max:100", "string"],
            "last_name"=> ["required", 'max:100', "string"],
            "department_id"=> ["required", "exists:departments,id"]
        ]);

        //'regex:/^[a-zA-Z\s\'-]+$/' regex maybe? in the future??

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee edited successfully!');
    }

    public function deleteEmployee($id){
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
