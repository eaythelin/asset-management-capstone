<?php

namespace App\Models;

use App\Enums\AssetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $casts = [
      'status' => AssetStatus::class  
    ];

    protected $fillable = [
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
        'custodian_id'
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
