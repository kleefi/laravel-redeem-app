<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voucher extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "unique_code",
        "reward_id",
        "is_used"
    ];
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function redeem()
    {
        return $this->hasOne(Redeem::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
