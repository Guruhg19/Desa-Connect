<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistance extends Model
{
    use SoftDeletes, UUID, HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'category',
        'amount',
        'provider',
        'description',
        'is_available'
    ];

    protected $casts = [
        'is_available' => 'boolean'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('provider', 'like', '%' . $search . '%')
                ->orWhere('amount', 'like', '%' . $search . '%');
    }

    public function SocialAssistanceRecipients(){
        return $this->hasMany(SocialAssistanceRecipient::class);
    }
}
