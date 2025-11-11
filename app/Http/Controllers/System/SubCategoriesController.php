<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function getSubCategories(){
        return view('pages.sub-categories');
    }
}
