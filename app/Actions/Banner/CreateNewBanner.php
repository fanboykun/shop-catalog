<?php

namespace App\Actions\Banner;
use App\Models\Banner;

class CreateNewBanner
{
    public function store(array $data)
    {

        $banner = Banner::create($data);
        $banner->addMediaFromRequest('picture')->toMediaCollection('banner');

        return $banner;
    }
}
