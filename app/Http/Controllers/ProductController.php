<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id')->get();
        return ProductResource::collection($products);
    }
    public function show($product){
        $product = Product::findOrFail($product);
        return new ProductResource($product);
    }
    public function store(){
        // return 'testsss';
        request()->validate([
            'name' => 'required|min:10|max:255',
            'price' => 'required|integer|min:100',
            // 'category_id' => 'required|exists:categories,id'
        ]);

        $data = request()->all();
        $product = Product::create($data);
        return new ProductResource($product);
    }
    public function update($product){
        $product = Product::findOrFail($product);
        // return $product;

        //gets all of the data from the request sent by the user
        $data = request()->all();

        $product->update($data);
        return new ProductResource($product);

    }
    public function destroy($product){
        $product = Product::findOrFail($product);

        $product->delete();
        return response()->noContent();
    }
}
