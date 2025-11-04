<?php
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\System\DepartmentsController;
use App\Http\Controllers\System\EmployeesController;
use App\Http\Controllers\System\UsersController;
use App\Http\Controllers\System\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    // Dashboard + Logout
    Route::middleware('check.permission:view dashboard')->group(function () {
      Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard.show');
    });

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logoutUser');

    //employees
    Route::group(["prefix" => "/employees"], function(){
      Route::middleware('check.permission:view employees')->group(function(){
        Route::get('/', [EmployeesController::class, "getEmployees"])->name('employees.show');
        Route::middleware('check.permission:manage employees')->group(function(){
          Route::post('/', [EmployeesController::class, 'storeEmployees'])->name('employees.store');
          Route::put('/{id}', [EmployeesController::class, 'updateEmployee'])->name('employees.update');
          Route::delete('/{id}',[EmployeesController::class, 'deleteEmployee'])->name('employees.delete');
        });
      });
    });
    
    // User Management
    Route::middleware('check.permission:view users')->group(function () {
      Route::get('/users', [UsersController::class, 'getUsers'])->name('showUsers');
    });

    //Configurations!
    Route::group(["prefix" => "/configs"], function(){
      //Departments
      Route::middleware('check.permission:view departments')->group(function(){
        Route::get('/departments', [DepartmentsController::class, 'getDepartments'])->name('department.show');
        Route::group(["prefix" => "/departments", "middleware" => "check.permission:manage departments"], function(){
          Route::post('/', [DepartmentsController::class, 'storeDepartments'])->name('departments.store');
          Route::put('/{id}', [DepartmentsController::class, 'updateDepartment'])->name('departments.update');
          Route::delete('/{id}',[DepartmentsController::class, 'deleteDepartment'])->name('departments.delete');
        });
      });
    });
});


require __DIR__.'/auth.php';