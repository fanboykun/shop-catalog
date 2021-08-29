<?php

namespace App\Actions\Category;
use App\Models\Category;

class GetAllCategory
{
    public function getAll()
    {
        $categories = Category::all();
        return $categories;
    }
}
