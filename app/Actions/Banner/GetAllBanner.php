<?php

namespace App\Actions\Banner;

use App\Models\Banner;

class GetAllBanner
{
    public function getAll()
    {
        $banners = Banner::all();
        return $banners;
    }
}
