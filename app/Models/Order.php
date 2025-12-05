<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'buyer_id',
        'vendor_id',
        'subtotal',
        'tax',
        'total',
        'status',
        'shipping_address',
        'stripe_session_id',
        'billing_address',
        'payment_method',
        'payment_status',
        'paid_at',
    ];

    public function buyer()
    {
        return $this->hasOne(User::class, 'buyer_id');
    }

    public function vendor()
    {
        return $this->hasOne(User::class, 'vendor_id');
    }
}
