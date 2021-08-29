<?php

namespace App\Actions\Product;

use App\Models\Product;

class CreateNewProduct
{
    public function store($data)
    {
        $product = Product::create($data);
        // $product->save($data);
        $sizes = $product['sizes'];
        foreach ($sizes as $size){
            $product->sizes()->attach($size, ['status' => $size['status']]);
        }
        return $product;
    }
}
