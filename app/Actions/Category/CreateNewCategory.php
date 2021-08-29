<?php

namespace App\Actions\Category;

use App\Models\Category;

class CreateNewCategory
{
    public function store($data)
    {
        $category = Category::create($data);
        return $category;
    }
}
