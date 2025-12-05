<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    protected $table = 'waitlist';

    protected $fillable = [
        'email',
        'name',
        'additional_features',
        'feature',
    ];
}
