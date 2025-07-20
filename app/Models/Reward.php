<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reward extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "name",
        "qty",
        "description"
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
