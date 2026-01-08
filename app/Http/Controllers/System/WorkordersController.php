<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkordersController extends Controller
{
    public function getWorkOrders(){
        return view('pages.workorders.index-workorders');
    }
}
