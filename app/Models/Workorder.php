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

    protected $fillable = [
      'request_id',
      'completed_by',
      'start_date',
      'end_date',
      'priority_level',
      'type',
      'status'
    ];

    public function disposalWorkOrders(){
      return $this->hasMany(DisposalWorkorder::class);
    }
}
