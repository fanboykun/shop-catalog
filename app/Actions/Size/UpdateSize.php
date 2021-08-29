<?php

namespace App\Actions\Size;

class UpdateSize
{
    public function update($size, $data)
    {
        $size->update($data);
        return $size;
    }
}
