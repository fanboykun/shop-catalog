<?php

namespace App\Actions\Product;

use App\Models\Product;

class CreateNewProduct
{
    public function store($data)
    {
        $product = Product::create($data);
        // $product->save($data);
        $product->sizes()->attach($data['size_id'], ['status' => $data['size_id']['status']]);
        // $sizes = $product['sizes'];
        // foreach ($sizes as $size){
        // }
        return $product;
    }
}
