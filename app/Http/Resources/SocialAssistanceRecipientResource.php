<?php

namespace App\Http\Resources;

use App\Models\HeadOfFamily;
use App\Models\SocialAssistance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialAssistanceRecipientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'social_assistance' => new SocialAssistanceResource($this->socialAssistance),
            'head_of_family' => new HeadOfFamilyResource($this->headOfFamily),
            'amount' => $this->amount,
            'reason' => $this->reason,
            'account_number' => $this->account_number,
            'proof' => $this->proof,
            'status' => $this->status
        ];
    }
}
