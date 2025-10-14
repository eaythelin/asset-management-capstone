<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function getForgotPage(){
        return view("auth.forgotpassword");
    }

    public function sendResetLink(Request $request){
        
    }
}
