<?php

namespace App\Models;

use App\Enums\RequestStatus;
use App\Enums\RequestTypes;
use App\Enums\ServiceTypes;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'description',
        'date_requested',
        'date_approved',
        'asset_name',
        'requested_by',
        'category_id',
        'sub_category_id',
        'approved_by',
        'asset_id',
        'status'
    ];

    protected $cast = [
        'type' => RequestTypes::class,
        'service_type' => ServiceTypes::class,
        'status' => RequestStatus::class
    ];
}
