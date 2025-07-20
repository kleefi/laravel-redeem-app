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
        "source",
        'status',
        'reward_id',
        'admin_notes',
        'is_winner',
        'selected_as_winner_at',
        'voucher_id',
    ];
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
