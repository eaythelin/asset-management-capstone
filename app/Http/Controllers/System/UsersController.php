<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function getUsers(){
        $users = User::with('roles')->paginate(5);
        $columns = ["", "Name", "Email", "Status","Role", "Actions"];
        return view("pages.users", compact('users', 'columns'));
    }

    public function storeUser(){

    }

    public function updateUser(){
        
    }

    public function deleteUser(){
        
    }
}
