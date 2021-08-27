<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    protected $appends = ['price_final'];

    public function getPriceFinalAttribute()
    {
        return $this->attributes['price'] - ($this->attributes['price'] * $this->attributes['discount'] / 100);
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
}
