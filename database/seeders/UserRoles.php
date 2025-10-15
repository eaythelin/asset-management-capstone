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
        $adminRole = Role::create(["name" => "admin"]);
        $deptHeadRole = Role::create(["name" => "department_head"]);
        $employeeRole = Role::create(["name" => "employee"]);

        //Permission list [to be expanded on!]
        Permission::create(["name" => "manage assets"]); //CRUD permission on Asset
        Permission::create(["name" => "view assets"]); //view permission on Asset

        //Assigning permissions
        $adminRole->givePermissionTo(["manage assets", "view assets"]);
        $deptHeadRole->givePermissionTo(["view assets"]);
        $employeeRole->givePermissionTo(["view assets"]);

        //create basic users for testing!
        $admin = User::firstOrCreate(
            ["email" => "guerrerojnmh@gmail.com"],
                [
                    "name" => "Admin",
                    "password" => Hash::make('password123')
                ]
            );
        $admin->assignRole($adminRole);

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
                    "name" => "Employee",
                    "password" => Hash::make('password123')
                ]
            );
        $employee->assignRole($employeeRole);
    }
}
