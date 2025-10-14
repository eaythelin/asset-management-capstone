<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //
    public function getResetPage(Request $request, string $token){
        return view('auth.resetpassword');
    }

    public function resetPassword(Request $request){

    }
}
