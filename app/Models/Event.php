<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes, UUID, HasFactory;

    protected $fillable =[
        'thumbnail',
        'name',
        'description',
        'price',
        'date',
        'time',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function scopeSearch($query, $search){
        return $query->where('name', 'like', '%' . $search . '%');
    }

    public function eventParticipants(){
        return $this->hasMany(EventParticipant::class);
    }

}
