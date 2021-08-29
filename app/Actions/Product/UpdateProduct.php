<?php

namespace App\Actions\Product;

class UpdateProduct
{
    public function update($product, $data)
    {
        $product->update($data);
        $sizes = $product['sizes'];
        foreach ($sizes as $size){
            $product->sizes()->sync($size, ['status' => $size['status']]);
        }
        return $product;
    }
}
