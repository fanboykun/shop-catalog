<?php

namespace App\Actions\Product;

class DeleteProduct
{
    public function destroy($product)
    {
        $product->delete();
        $sizes = $product['sizes'];
        $product->sizes()->detach($sizes);
        return null;
    }
}
