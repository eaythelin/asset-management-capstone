<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //
    public function getUsers(){
        $users = User::with('roles')->paginate(5);
        $employees = (new Employee)->newQuery()->select('id', 'first_name', 'last_name')->whereDoesntHave('user')->get();
        $roles = Role::pluck('name', 'id');

        $employees = $employees->mapWithKeys(function ($employee) {
                return [$employee->id => $employee->first_name . ' ' . $employee->last_name];
        });
        
        $columns = ["", "Name", "Email", "Status","Role", "Actions"];
        return view("pages.users", compact('employees', 'columns', 'users', 'roles'));
    }

    public function storeUser(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255','unique:users,email'],
            'password' => ['required', 'min:8', 'string'],
            'employee_id' => ['required', 'exists:employees,id'],
            'role_id' => ['required', 'exists:roles,id']
        ]);

        //get employee info
        $employee = Employee::findOrFail($validated['employee_id']);

        $username = $employee->first_name . ' ' . $employee->last_name;

        $user = User::create([
            'name' => $username,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'employee_id' => $validated['employee_id']
        ]);

        //get role info
        $role = Role::findOrFail($validated['role_id']);

        $user->assignRole($role->name);

        return redirect()->route('users.show')->with('success', 'System User successfully created!');
    }

    public function updateUser(){
        
    }

    public function deleteUser(){
        
    }
}
