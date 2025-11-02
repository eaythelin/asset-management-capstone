<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            "first_name"=> "Janna Mhay",
            "last_name"=> "Guerrero",
            "department_id"=>3
        ]);

        Employee::create([
            "first_name"=> "Varka",
            "last_name"=> "Mondstadt",
            "department_id"=>2
        ]);

        Employee::create([
            "first_name"=> "Potato",
            "last_name"=> "Master",
            "department_id"=>1
        ]);
    }
}
