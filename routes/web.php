<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\System\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["auth"]], function(){
  //dashboard
  Route::get('/dashboard', [DashboardController::class, 'getDashboard']) -> name('showDashboard');

  //logout
  Route::post("/logout",[LogoutController::class, "logout"]) -> name('logoutUser');
});

require __DIR__.'/auth.php';