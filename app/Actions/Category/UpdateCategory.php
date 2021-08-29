<?php

namespace App\Actions\Category;

class UpdateCategory
{
    public function update($category, $data)
    {
        $category->update([
            'name' => $data['name'],
            'is_featured' => $data['is_featured'],
        ]);
        return $category;
    }
}
