<?php

namespace App\Models\Traits;

use App\Service\TwilioService;

trait MustVerifyPhone
{
    public function hasVerifiedPhone(): bool
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified(): bool
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendPhoneVerificationNotification(): void
    {

        app(TwilioService::class)->sendPhoneVerificationCode();
    }
}
