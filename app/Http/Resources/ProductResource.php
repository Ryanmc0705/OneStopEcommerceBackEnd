<?php

namespace App\Http\Resources;

use App\Models\ProductImage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            "product_name" => $this->product_name,
            "description"  => $this->description,
            "image"        => $this->image,
            "category"     => new CategoryResource($this->category),
            "brand"     => new BrandResource($this->brand),
            "sub_category"     => new SubCategoryResource($this->subcategory),
            "images" => ProductImagesResource::collection($this->productimage)
            
        ];
    }
}
