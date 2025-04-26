<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes, UUID, HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'headman',
        'people',
        'about',
        'agricultural_area',
        'total_area'
    ];

    protected $casts = [
        'agricultural_area' => 'decimal:2',
        'total_are' => 'decimal:2',
    ];

    public function profileImages(){
        return $this->hasMany(ProfileImage::class);
    }

}
