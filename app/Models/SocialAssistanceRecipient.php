<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistanceRecipient extends Model
{
    use SoftDeletes,UUID;

    protected $fillable = [
        'social_assistance_id',
        'head_of_family_id',
        'bank',
        'amount',
        'reason',
        'account_number',
        'proof',
        'status'
    ];

    public function SocialAssistance(){
        return $this->belongsTo(SocialAssistance::class,'social_assistance_id');
    }

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class,'head_of_family_id');
    }



}
