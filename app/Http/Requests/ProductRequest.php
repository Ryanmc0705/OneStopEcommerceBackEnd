<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "category_id" => "required",
            "sub_category_id" => "required",
            "brand_id" => "required",
            "product_name" => "required|min:5",
            "description"  => "required|min:5|max:200",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "other_images.*" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ];
    }
    // public function messages()
    // {
    //     return [
    //         "category_id.required" => "Category is required",
    //         "sub_category_id.required" => "Sub Category is required",
    //         "brand.required" => "Brand is required",
    //     ];
    // }
}
