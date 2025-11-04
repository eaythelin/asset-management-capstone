<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'department_name',
        'description'
    ];

    //One Department can have Many Employee
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function scopeSearch($query, $search){
        if (!$search) return $query;

        return $query->where('department_name', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%");
    }
}
