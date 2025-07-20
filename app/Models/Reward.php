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
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function usedVouchersCount()
    {
        return $this->vouchers()->where('is_used', true)->count();
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
