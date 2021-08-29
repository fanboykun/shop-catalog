<?php

namespace App\Actions\Banner;

class ShowBanner
{
    public function show($banner)
    {
        return $banner->load(['products.category', 'products.sizes']);
    }
}
