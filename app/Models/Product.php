<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'banner_id',
        'name',
        'slug',
        'category_id',
        'price',
        'description',
        'discount',
        'photo',
        'is_soldout',
        'is_hot',
    ];

    protected $appends = ['price_final', 'photo_url'];

    public function getPriceFinalAttribute()
    {
        return $this->attributes['price'] - ($this->attributes['price'] * $this->attributes['discount'] / 100);
    }

    public function getPhotoUrlAttribute()
    {
        return $this->attributes['photo'] != NULL ? $this->attributes['photo'] : 'https://ui-avatars.com/api/?name='.urlencode($this->attributes['name']).'&color=7F9CF5&background=EBF4FF';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('status');
    }

    public function scopeRelated($query, $product)
    {
        return $query->where(function($q) use($product){
                                $q->where('category_id', $product->category->id)
                                ->orWhere('banner_id', $product->banner_id)
                                ->limit(5);
                            })
                    ->orWhere(function ($q){
                        $q->where('is_hot', true)
                        ->limit(5);
                    })
                    ->where('is_soldout', false)
                ->limit(10);
    }
}
