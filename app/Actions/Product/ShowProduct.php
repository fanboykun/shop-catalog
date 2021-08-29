<?php

namespace App\Actions\Product;
use App\Models\Product;

class ShowProduct
{
    public function show($product)
    {
        return $product->load(['category','sizes']);
    }
}
