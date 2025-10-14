<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'deparment_name',
        'description'
    ];

    //One Department can have Many User
    public function users(){
        return $this->hasMany(User::class);
    }
}
