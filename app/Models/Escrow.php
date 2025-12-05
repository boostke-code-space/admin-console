<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escrow extends Model
{
    /** @use HasFactory<\Database\Factories\EscrowFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'buyer_id',
        'vendor_id',
        'amount',
        'status',
        'release_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
