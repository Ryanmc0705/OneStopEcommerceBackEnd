<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function Brand()
    {
        return $this->hasMany(Brand::class);
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
