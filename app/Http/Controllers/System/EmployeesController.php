<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function getEmployees(){
        return view("pages.employees");
    }
}
