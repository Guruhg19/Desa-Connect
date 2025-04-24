<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventParticipant extends Model
{
    use SoftDeletes,UUID;

    protected $fillable =[
        'event_id',
        'head_of_family_id',
        'quantity',
        'total_price',
        'payment_statusx'
    ];

    public function scopeSearch($query, $search){
        return $query->whereHas('headOfFamily', function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search){
                $query->where('name', 'like', '%' . $search . '%');
                $query->orWhere('email', 'like', '%' . $search . '%');
            });
        });
    }

    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class,'head_of_family_id');
    }

}
