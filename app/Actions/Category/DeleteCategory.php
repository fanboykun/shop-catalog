<?php

namespace App\Actions\Category;

class DeleteCategory
{
    public function destroy($category)
    {
        $category->delete();
        return null;
    }
}
