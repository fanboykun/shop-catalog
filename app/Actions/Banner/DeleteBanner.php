<?php

namespace App\Actions\Banner;

class DeleteBanner
{
    public function destroy($banner)
    {
        if ($banner->picture != null) {
            $banner->getMedia('banner')->each(function($item){
                $item->delete();
            });
        }
        $banner->delete();
        return null;
    }
}
