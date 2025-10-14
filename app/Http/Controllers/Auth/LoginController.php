<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view("auth.login");
    }

    public function loginUser(Request $request){
        //check request
        //if you add bail, if any of the rules gets violated, the validation immedietly stops and return with the first error
        $credentials = $request -> validate([
            "email"=>["bail","required", "email", "string", "max:255"],
            "password"=>["bail","required", "string", "min:8"]
        ]);

        //laravel will compare records in the DB and return true if the record matches
        if(Auth::attempt($credentials)){
            //regenerate session token to prevent session hijacking and fixation
            $request -> session() -> regenerate();

            return redirect() -> route("showDashboard");
        }

        //if auth failed, redirect with an error message and only return email

        return back()->withErrors([
            'email' => "The provided credentials do not match our records."  
        ]) -> onlyInput("email");
    }
}
