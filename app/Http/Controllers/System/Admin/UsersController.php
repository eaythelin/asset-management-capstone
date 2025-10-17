<?php

namespace App\Http\Controllers\System\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function getUsers(){
        return view("pages.users");
    }
}
