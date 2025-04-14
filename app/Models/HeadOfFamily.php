<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadOfFamily extends Model
{
    use SoftDeletes, UUID;

    protected $fillable = [
        'user_id',
        'profile_picture',
        'identity_number',
        'gender',
        'date_of_birth',
        'phone_number',
        'occupation',
        'marital_status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function familyMembers(){
        return $this->hasMany(FamilyMember::class);
    }

    public function socialAssistanceRecipients(){
        return $this->hasMany(SocialAssistanceRecipient::class);
    }

    public function eventParticipants(){
        return $this->hasMany(EventParticipant::class);
    }
    
}
