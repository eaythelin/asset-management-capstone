<?php

namespace App\Models;

use App\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
      'status' => AssetStatus::class  
    ];

    protected $fillable = [
        'asset_code',
        'name',
        'serial_name',
        'description',
        'is_depreciable',
        'acquisition_date',
        'cost',
        'image_path',
        'category_id',
        'sub_category_id',
        'supplier_id',
        'custodian_id',
        'department_id',
        'useful_life_in_years',
        'salvage_value',
        'end_of_life_date'
    ];

    public function custodian(){
        return $this->belongsTo(Employee::class, 'custodian_id');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
