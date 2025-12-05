<?php

namespace App\Models;

use App\Contracts\MustVerifyPhone;
use App\Models\Traits\MustVerifyPhone as MustVerifyPhoneTrait;
use Filament\Panel;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

// added

// added

class User extends Authenticatable implements MustVerifyPhone
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Billable, HasFactory, MustVerifyEmail, MustVerifyPhoneTrait, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
        'phone',
        'phone_verified_at',
        'email_verified_at',
        'stripe_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function membership()
    {
        return $this->hasOneThrough(Membership::class, Subscription::class, 'user_id', 'id', 'id', 'membership_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    public function ambassador()
    {
        return $this->belongsTo(Ambassador::class);
    }

    public function referral_as_referee()
    {
        return $this->hasOne(Referral::class, 'recruited_id');
    }

    public function canAccessPanel()
    {
        return $this->hasRole(['admin']);
    }
}
