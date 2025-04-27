<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory;

    public $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
