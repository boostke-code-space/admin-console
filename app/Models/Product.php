<?php

namespace App\Models;

use App\Policies\ProductPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(ProductPolicy::class)]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    /**
     * Summary of fillable
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'status',
        'featured',
    ];

    /**
     * Summary of categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<ProductCategory, Product>
     */
    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    /**
     * Summary of store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Store, Product>
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function tags()
    {
        return $this->hasMany(ProductTags::class);
    }

    public function orders()
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
