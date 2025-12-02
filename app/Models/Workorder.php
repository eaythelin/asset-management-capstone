<?php

namespace App\Models;

use App\Enums\PriorityLevel;
use App\Enums\WorkorderStatus;
use App\Enums\WorkorderType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    use HasFactory;

    protected $casts = [
      'priority_level' => PriorityLevel::class,
      'type' => WorkorderType::class,
      'status' => WorkorderStatus::class 
    ];
}
