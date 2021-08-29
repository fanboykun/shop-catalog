<?php

namespace App\Actions\Size;

class DeleteSize
{
    public function destroy($size)
    {
        $size->delete();
        return null;
    }
}
