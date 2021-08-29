<?php

namespace App\Actions\Size;
use App\Models\Size;

class GetAllSize
{
    public function getAll()
    {
        $sizes = Size::all();
        return $sizes;
    }
}
