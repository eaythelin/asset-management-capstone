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
        Route::get('/', [EmployeesController::class, "getEmployees"])->name('employees.index');
        Route::get('/{id}',[EmployeesController::class,"getEmployee"])->name('employees.show');
        Route::middleware('check.permission:manage employees')->group(function(){
          Route::post('/', [EmployeesController::class, 'storeEmployees'])->name('employees.store');
          Route::put('/{id}', [EmployeesController::class, 'updateEmployee'])->name('employees.update');
          Route::delete('/{id}',[EmployeesController::class, 'deleteEmployee'])->name('employees.delete');
        });
      });
    });

    Route::group(['prefix' => '/users', 'middleware'=> 'check.permission:view users'], function(){
      Route::get('/', [UsersController::class, 'getUsers'])->name('users.show');
      Route::middleware('check.permission:manage users')->group(function(){
        Route::post('/', [UsersController::class, 'storeUser'])->name('users.store');
        Route::post('/{id}', [UsersController::class, 'updateUser'])->name('users.update');
        Route::post('/{id}', [UsersController::class, 'deleteUser'])->name('users.delete');
      });
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