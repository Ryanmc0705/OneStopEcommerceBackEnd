<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
