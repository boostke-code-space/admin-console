<?php

namespace App\Models;

use App\Policies\AmbassadorPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


#[UsePolicy(AmbassadorPolicy::class)]
class Ambassador extends Model
{
    /** @use HasFactory<\Database\Factories\AmbassadorFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'referral_code',
        'passport_photo',
        'kra_pin',
        'id_card',
        'verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }
}
