<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'title' => $this->title,
            'picture' => $this->picture,
            'is_active' => $this->is_active == true ? 'true' : 'false',
            'slug' => $this->slug,
            'products' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
