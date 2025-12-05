<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralRewards extends Model
{
    /** @use HasFactory<\Database\Factories\ReferralRewardsFactory> */
    use HasFactory;

    protected $fillable = [
        'referral_id',
        'cash',
        'points',
    ];

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }
}
