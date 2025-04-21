<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistanceRecipient extends Model
{
    use SoftDeletes,UUID, HasFactory;

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

    public function scopeSearch($query, $search){
        return $query->whereHas('headOfFamily', function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search){
                $query->where('name', 'like', '%' . $search . '%');
                $query->where('email', 'like', '%' . $search . '%');
            });
        });
    }

    public function SocialAssistance(){
        return $this->belongsTo(SocialAssistance::class,'social_assistance_id');
    }

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class,'head_of_family_id');
    }



}
