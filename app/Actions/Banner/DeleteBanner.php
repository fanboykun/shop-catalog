<?php

namespace App\Actions\Banner;

class DeleteBanner
{
    public function destroy($banner)
    {
        $banner->delete();
        return null;
    }
}
