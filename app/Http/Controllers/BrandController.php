<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BrandController extends Controller
{
    public function index()
    {
        return response([
            "brands" => Brand::all()
        ]);
    }

    public function store(BrandRequest $request)
    {
        Brand::create($request->all());
        return response(["message" => "brand saved"],200);
    }

    public function show($id)
    {
        return response(["data" => Brand::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $brand = Brand::where("id",$id);
        if($brand->update($request->all())){
            return response(["message" => "success"],200);
        }else{
            return response(["message" => "failed"],304);
        }
        
    }
    public function destroy($id)
    {
        $brand = Brand::where("id",$id);
        if($brand->delete()){
            return response(["message" => "success"],200);
        }else{
            return response(["message" => "failed"],304);
        }
    }

}
