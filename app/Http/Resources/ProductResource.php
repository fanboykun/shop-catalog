<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
// use Illuminate\Support\Str;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'banner_id' => new BannerResource($this->whenLoaded('banner')),
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'photo_url' => $this->photo_url,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'price' => $this->price,
            'price_final' => $this->price_final,
            'description' => $this->description,
            'sizes' => SizeResource::collection($this->whenLoaded('sizes')),
            'is_soldout' => $this->is_soldout,
            'is_hot' => $this->is_hot,
        ];
    }
}
