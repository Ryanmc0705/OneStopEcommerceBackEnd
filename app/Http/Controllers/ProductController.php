<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(["Brand", "Category", "SubCategory"])->paginate(10);
        return response(["products" => ProductResource::collection($products)->resource]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $imageName = $request->product_name . "-" . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/product_images', $imageName);
            $data = $request->all();
            unset($data["other_images"]);
            $data["image"] = $imageName;
            $product = Product::create($data);
            if ($product) {
                $other_images = array();
                if ($request->hasfile('other_images')) {
                    foreach ($request->file('other_images') as $key => $file) {
                        $path = $file->store('public/product_images');
                        array_push($other_images,["product_id"=>$product->id,"path"=>$path]);
                    }
                    
                }
                ProductImage::insert($other_images);
                DB::commit();
                return response(["message" => "success"], 200);
            } else {
                return response(["message" => "failed"], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(["Brand", "Category", "SubCategory","ProductImage"])->where("id", $id)->get();
        return response(["product" => ProductResource::collection($product)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageName = $request->product_name . "-" . time() . '.' . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);
        $data = $request->all();
        $data["image"] = $imageName;
        if (Product::where("id", $id)->update($request->all())) {
            return response(["message" => "success"], 200);
        } else {
            return response(["message" => "failed"], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where("id", $id);
        if ($product->delete()) {
            return response(["message" => "success"], 200);
        } else {
            return response(["message" => "failed"], 400);
        }
    }
}
