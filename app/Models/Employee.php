<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'department_id',
        'custodian'
    ];
    
    //Employee can only have one Department
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // Optional: employee may have a user account
    public function user(){
        return $this->hasOne(User::class);
    }
}
