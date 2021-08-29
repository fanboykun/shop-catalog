<?php

namespace App\Actions\Product;

use App\Models\Product;

class GetAllProduct
{
    public function getAll()
    {
        $products = Product::with(['category','sizes'])->get();
        return $products;
    }
}
