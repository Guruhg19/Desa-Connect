<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DevelopmentApplicant extends Model
{
    use SoftDeletes,UUID;

    protected $fillable =[
        'development_id',
        'user_id',
        'status'
    ];

    public function scopeSearch($query, $search){
        return $query->whereHas('user', function ($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function development(){
        return $this->belongsTo(Development::class,'development_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
