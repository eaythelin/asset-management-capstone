<?php
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\System\DepartmentsController;
use App\Http\Controllers\System\EmployeesController;
use App\Http\Controllers\System\UsersController;
use App\Http\Controllers\System\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    // Dashboard + Logout
    Route::middleware('can:view dashboard')->group(function () {
      Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('showDashboard');
    });

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logoutUser');

    // User Management
    Route::middleware('can:view users')->group(function () {
      Route::get('/users', [UsersController::class, 'getUsers'])->name('showUsers');
    });

    //Departments
    Route::group(["prefix" => "/configs"], function(){
      Route::middleware('can:view departments')->group(function(){
        Route::get('/departments', [DepartmentsController::class, 'getDepartments'])->name('showDepartments');
        Route::middleware('can:manage departments')->group(function(){
          Route::post('/departments', [DepartmentsController::class, 'storeDepartments'])->name('departments.store');
          Route::put('departments/{id}', [DepartmentsController::class, 'updateDepartment'])->name('departments.update');
          Route::delete('/departments/{id}',[DepartmentsController::class, 'deleteDepartment'])->name('departments.delete');
        });
      });
    });

    Route::middleware('can:view employees')->group(function(){
      Route::get('/employees', [EmployeesController::class, "getEmployees"])->name('showEmployees');
    });
});


require __DIR__.'/auth.php';