<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'target_audience',
        'included_in',
        'addon_price',
        'sponsored_by',
        'benefits',
    ];

    protected $casts = [
        'benefits' => 'array',
    ];
}
