<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Banner extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    protected $fillable = [
        'title',
        'is_active',
        'slug',
    ];

    protected $appends = ['picture'];

    public function getPictureAttribute()
    {
        // $media = $this->getMedia('banner')->each(function ($item){
        //     $item->geturl();
        // });
        // return $media;
        return $this->getMedia('banner');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function picture()
    // {
    //     return $this->hasOne(Media::class, 'id','model_id');
    // }
}
