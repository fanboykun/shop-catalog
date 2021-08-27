<?php

namespace App\Http\Controllers;

use App\Actions\{GetAllProduct, CreateNewProduct, UpdateProduct, DeleteProduct, ShowProduct};
use App\Http\Resources\ProductResource;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(GetAllProduct $action)
    {
        $products = $action->getall();
        return new ProductResource($products);
    }

    public function store(StoreProductRequest $request, CreateNewProduct $action)
    {
        $product = $action->store($request->all());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product, ShowProduct $action)
    {
        $product = $action->show($product);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProduct $action)
    {
        $data = $request->all();
        $product = $action->update($product, $data);

        return (new ProductResource($product))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product, DeleteProduct $action)
    {
        $action->destroy($product);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
