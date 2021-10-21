<?php

use App\Http\Controllers\{ProductController,CategoryController,SizeController,StoreController,BannerController};
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products/{product}/related', function (Product $product) {
    $products = Product::related($product)->get();
    return response()->success(ProductResource::collection($products));

});

// Route::get('banners/token', [BannerController::class, 'showToken']);


Route::apiResource('/products',ProductController::class);
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/sizes', SizeController::class);
Route::apiResource('/banners', BannerController::class);
Route::apiResource('/stores', StoreController::class)->except('store','destroy','show');


