<?php

namespace App\Actions\Banner;
use App\Models\Banner;

class CreateNewBanner
{
    public function store($data)
    {
        $banner =  Banner::create($data);
        return $banner;
    }
}
