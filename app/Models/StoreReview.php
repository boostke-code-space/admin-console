<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreReview extends Model
{
    /** @use HasFactory<\Database\Factories\StoreReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'store_id',
        'review_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
