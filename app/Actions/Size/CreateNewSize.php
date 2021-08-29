<?php

namespace App\Actions\Size;

use App\Models\Size;

class CreateNewSize
{
    public function store($data)
    {
        $size = Size::create($data);
        return $size;
    }
}
