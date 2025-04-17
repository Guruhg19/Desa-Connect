<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use SoftDeletes,UUID;

    protected $fillable = [
        'user_id',
        'head_of_family_id',
        'profile_picture',
        'identity_number',
        'gender',
        'date_of_birth',
        'phone_number',
        'occupation',
        'marital_status',
        'relation'
    ];

    public function scopeSearch($query, $search){
        return $query->whereHas('user', function ($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%' )
            ->orWhere('email', 'like', '%' . $search . '%' );
        })->orWhere('phone_number', 'like', '%' . $search . '%' )
        ->orWhere('identity_number', 'like', '%' . $search . '%' );
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class,'head_of_family_id');
    }


}
