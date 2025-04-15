<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'headman',
        'people',
        'about',
        'agricultural_area',
        'total_area'
    ];


    public function profileImages(){
        return $this->hasMany(ProfileImage::class);
    }

}
