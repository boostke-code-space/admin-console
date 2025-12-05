<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    /** @use HasFactory<\Database\Factories\PayoutFactory> */
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'amount',
        'method',
        'status',
        'requested_at',
        'processed_at',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
