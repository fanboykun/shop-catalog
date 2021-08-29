<?php

namespace App\Actions\Banner;

class UpdateBanner
{
    public function update($banner, $data)
    {
        $banner->update($data);
        return $banner;
    }
}
