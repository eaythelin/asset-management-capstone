<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

//name this as Login since Laravel will default to login route if a user tries to access protected routes if the user isnt login
Route::group(['middleware' => ["guest", "throttle:100,1"]], function(){
  Route::get('/', [LoginController::class, "getLogin"]) -> name("login");
  Route::post('/', [LoginController::class, "loginUser"]) -> name("loginUser");
  
  //reset password
  Route::get('/forgot-password', [ForgotPasswordController::class, "getResetPassword"]) -> name("password.request");
});