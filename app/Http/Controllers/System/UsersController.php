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
    public function getUsers(Request $request){
        $query = User::with('roles', 'employee');

        if(request('show_deleted')){
            //show only soft deleted users!
            $query->onlyTrashed();
        }

        $users = $query->paginate(5);

        $employees = Employee::select('id', 'first_name', 'last_name')->whereDoesntHave('user')->get();
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

    public function updateUser(Request $request, $id){
        
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);

        if(auth()->id()=== $user->id){
            return redirect()->route('users.show')->with('error', 'You cannot delete your own account!');
        }

        $user->update(['is_active' => false]);
        $user->delete();

        return redirect()->route('users.show')->with('success', 'User has been successfully deleted!');
    }
}
