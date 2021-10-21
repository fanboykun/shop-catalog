<?php

namespace App\Actions\Banner;

use App\Models\Banner;

class UpdateBanner
{
    public function update(int $id, $data)
    {
        $banner = Banner::find($id);
        $banner->update([
            'title' => $data->title,
            'is_active' => $data->is_active
        ]);
        if ($data->has('picture') != null){
            $this->syncNewPicture($banner);
        }
        return $banner;
    }

    public function syncNewPicture($banner)
    {
        $banner->getMedia('banner')->each(function($item){
            $item->delete();
        });
        $banner->addMediaFromRequest('picture')->toMediaCollection('banner');

        return $banner;
    }
}
