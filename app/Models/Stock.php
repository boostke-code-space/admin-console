<?php

namespace App\Models;

use App\Policies\StockPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(StockPolicy::class)]
class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'low_stock_threshold',
        'reserved_quantity',
        'expires_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
