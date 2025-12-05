<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StoreVisibilityScope implements Scope
{
    public $user;

    public function __construct($user = null)
    {
        $this->user = $user;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {

        if ($this->user->is_admin()) {
            return;
        }

        if ($this->user->is_vendor()) {
            $builder->where('store_id', $this->user->store->id);
        }
    }
}
