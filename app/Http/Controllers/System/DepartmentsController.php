<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    //
    public function getDepartments(){
        return view("pages.departments");
    }
}
