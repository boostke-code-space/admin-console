<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    /** @use HasFactory<\Database\Factories\ReferralFactory> */
    use HasFactory;

    protected $fillable = [
        'ambassador_id',
        'recruited_id',
    ];

    protected $casts = [
        'cash_awarded' => 'decimal:2',
        'metadata' => 'array',
    ];

    public function referrer()
    {
        return $this->belongsTo(Ambassador::class, 'ambassador_id');
    }

    public function referee()
    {
        return $this->belongsTo(User::class, 'recruited_id');
    }

    public function rewards()
    {
        return $this->hasMany(ReferralRewards::class);
    }
}
