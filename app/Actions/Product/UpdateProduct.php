<?php

namespace App\Actions\Product;

class UpdateProduct
{
    public function update($product, $data)
    {
        $product->update($data);
        // $sizes = $product['sizes'];
        $product->sizes()->sync($data['size_id'], ['status' => $data['size_id']['status']]);
        // foreach ($sizes as $size){
        // }
        return $product;
    }
}
