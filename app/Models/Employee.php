<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'department'
    ];
    
    //Employee can only have one Department
    public function department(){
        return $this->belongsTo(Department::class);
    }

    //Each employee can optionally belongs to a user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
