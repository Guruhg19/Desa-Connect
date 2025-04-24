<?php

namespace App\Http\Resources;

use App\Models\HeadOfFamily;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventParticipantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event' => new EventResource($this->event),
            'head_of_family' => new HeadOfFamilyResource($this->headOfFamily),
            'quantity' => $this->quantity,
            'total_price' => (float)(string) $this->total_price,
            'payment_status' => $this->payment_status
        ];
    }
}
