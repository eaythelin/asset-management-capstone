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
        $crudPermissions = [
            'manage assets', 
            'manage departments',
            'manage users',
            'manage employees',
        ];

        $viewPermissions = [
            'view assets',
            'view departments',
            'view users',
            'view employees',
            'view configs',
            'view dashboard'
        ];

        foreach($crudPermissions as $crudPermission){
            Permission::firstOrCreate(["name" => $crudPermission]);
        }

        foreach($viewPermissions as $viewPermission){
            Permission::firstOrCreate(["name" => $viewPermission]);
        }

        //Assigning permissions
        $systemSupervisorPerms = [
            'manage assets', 
            'manage departments',
            'manage users',
            'manage employees',
            'view assets',
            'view departments',
            'view users',
            'view employees',
            'view configs',
            'view dashboard'
        ];

        foreach($systemSupervisorPerms as $perms){
            $systemSupervisorRole->givePermissionTo($perms);
        }

        $deptHeadPerms = [
            'view assets',
            'view employees',
            'view dashboard'
        ];

        foreach($deptHeadPerms as $perms){
            $deptHeadRole->givePermissionTo($perms);
        }

        $generalManagerPerms = [
            'view assets',
            'view employees',
            'view dashboard'
        ];

        foreach($generalManagerPerms as $perms){
            $generalManagerRole->givePermissionTo($perms);
        }

        //create basic users for testing!
        $admin = User::firstOrCreate(
            ["email" => "guerrerojnmh@gmail.com"],
                [
                    "name" => "Janna Mhay C. Guerrero",
                    "password" => Hash::make('password123')
                ]
            );
        $admin->assignRole($systemSupervisorRole);

        $deptHead = User::firstOrCreate(
            ["email" => "jannamhayg@gmail.com"],
                [
                    "name" => "Janna Mhay C. Guerrero",
                    "password" => Hash::make('password123')
                ]
            );
        $deptHead->assignRole($deptHeadRole);

        $employee = User::firstOrCreate(
            ["email" => "gjannamhay@gmail.com"],
                [
                    "name" => "Janna Mhay C. Guerrero",
                    "password" => Hash::make('password123')
                ]
            );
        $employee->assignRole($generalManagerRole);
    }
}
