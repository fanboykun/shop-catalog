<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'is_active',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
