<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // 'thumbnail',
        // 'name',
        // 'headman',
        // 'people',
        // 'about',
        // 'agricultural_area',
        // 'total_area'
        return [
            'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'name' => $this->name,
            'headman' => $this->headman,
            'people' => $this->people,
            'about' => $this->about,
            'agricultural_area' => $this->agricultural_area,
            'total_area' => $this->total_area,
            'profile_images' => ProfileImageResource::collection($this->profileImages)
        ];
    }
}
