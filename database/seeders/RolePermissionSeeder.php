<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
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
            'manage categories',
            'manage sub-categories',
            'manage suppliers',
            'manage assets'
        ];

        $viewPermissions = [
            'view assets',
            'view departments',
            'view users',
            'view employees',
            'view configs',
            'view dashboard',
            'view categories',
            'view sub-categories',
            'view assets',
            'view suppliers'
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
            'manage categories',
            'manage sub-categories',
            'manage assets',
            'manage suppliers',
            'view departments',
            'view users',
            'view employees',
            'view configs',
            'view dashboard',
            'view categories',
            'view sub-categories',
            'view assets',
            'view suppliers'
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
    }
}
