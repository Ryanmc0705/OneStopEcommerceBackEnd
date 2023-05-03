<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function ProductReview()
    {
        return $this->hasMany(ProductReview::class);
    }
    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class);
    }
}
