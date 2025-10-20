<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create role
        $systemSupervisorRole = Role::create(["name" => "System Supervisor"]);
        $deptHeadRole = Role::create(["name" => "Department Head"]);
        $generalManagerRole = Role::create(["name" => "General Manager"]);

        //Permission list [to be expanded on!]
        Permission::create(["name" => "manage assets"]); //CRUD permission on Asset
        Permission::create(["name" => "view assets"]); //view permission on Asset
        Permission::create(["name" => "manage departments"]); //CRUD permission on Departments
        Permission::create(["name" => "view departments"]); //view permission on Departments
        Permission::create(["name" => "manage users"]); //CRUD permission on Users
        Permission::create(["name" => "view users"]); //view permission on Users
        Permission::create(["name" => "manage employees"]); //CRUD permission on Employees
        Permission::create(["name" => "view employees"]); //view permission on Employees

        //Assigning permissions
        $systemSupervisorRole->givePermissionTo(["manage assets", "view assets", "view departments" ,"manage departments", "manage users", "manage employees","view employees"]);
        $deptHeadRole->givePermissionTo(["view assets"]);
        $generalManagerRole->givePermissionTo(["view assets", "view employees", "view departments"]);

        //create basic users for testing!
        $admin = User::firstOrCreate(
            ["email" => "guerrerojnmh@gmail.com"],
                [
                    "name" => "System Supervisor",
                    "password" => Hash::make('password123')
                ]
            );
        $admin->assignRole($systemSupervisorRole);

        $deptHead = User::firstOrCreate(
            ["email" => "jannamhayg@gmail.com"],
                [
                    "name" => "Department Head",
                    "password" => Hash::make('password123')
                ]
            );
        $deptHead->assignRole($deptHeadRole);

        $employee = User::firstOrCreate(
            ["email" => "gjannamhay@gmail.com"],
                [
                    "name" => "General Manager",
                    "password" => Hash::make('password123')
                ]
            );
        $employee->assignRole($generalManagerRole);
    }
}
