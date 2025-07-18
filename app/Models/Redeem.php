<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Redeem extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "name",
        "province",
        "city",
        "district",
        "email",
        "phone",
        "unique_code",
        "unique_code_image",
        "source"
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
