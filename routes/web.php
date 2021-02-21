<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\Category;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return redirect('categories');
    // return view('welcome');
});


Route::get('/products',function(){
    // $products=[
    //     ['id' => 1,'name' => "Product 1", "Price" => 100],
    //     ['id' => 2,'name' => "Product 2", "Price" => 200]
    // ];
    $products = Product::orderBy('id')->get();
    return ProductResource::collection($products);
    // return view('products.index',compact('products'));
});

Route::get('products/create',function(){
    return view('products.create');
});

Route::get('/products/{product}',function($product){
    // return view('products.show',compact('product'));
    $product = Product::findOrFail($product);
    return new ProductResource($product);
});

Route::get('/categories',function(){
    $category = Category::orderBy('id')->get();
    return CategoryResource::collection($category);
    // return response()->json(["category1","category2"]);
});