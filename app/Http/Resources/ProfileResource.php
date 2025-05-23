<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ProfileImageResource;
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
            // 'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'name' => $this->name,
            'headman' => $this->headman,
            'people' => $this->people,
            'about' => $this->about,
            'agricultural_area' => (float)(string) $this->agricultural_area,
            'total_area' =>(float)(string) $this->total_area,
            'profile_images' => ProfileImageResource::collection($this->profileImages)
        ];
    }
}
