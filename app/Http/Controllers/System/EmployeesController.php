<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function getEmployees(){
        // Get employees with their department info
        $employees = Employee::with('department')->paginate(5);

        $columns = ["","Name", "Department", "Custodian", "Actions"];
        return view("pages.employees", compact('employees', 'columns'));
    }
}
