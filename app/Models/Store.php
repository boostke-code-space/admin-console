<?php

namespace App\Models;

use App\Policies\StorePolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(StorePolicy::class)]
class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'slug',
        'latitude',
        'longitude',
        'logo_url',
        'twitter',
        'tiktok',
        'facebook',
        'instagram',
        'status',
        'county',
        'county_permit',
    ];

    protected $hidden = [
        'county_permit'
    ];

    /**
     * Summary of owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Vendor, Store>
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Summary of products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Product, Store>
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Summary of stocks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough<Stock, Product, Store>
     */
    public function stocks()
    {
        return $this->hasManyThrough(Stock::class, Product::class);
    }
}
