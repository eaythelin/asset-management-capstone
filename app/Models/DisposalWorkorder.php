<?php

namespace App\Models;

use App\Enums\DisposalMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposalWorkorder extends Model
{
    use HasFactory;

    protected $casts = [
        "disposal_method" => DisposalMethods::class
    ];
}
