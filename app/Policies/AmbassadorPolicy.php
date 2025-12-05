<?php

namespace App\Policies;

use App\Models\Ambassador;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AmbassadorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['super-admin', 'cmo']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ambassador $ambassador): bool
    {
        return $ambassador->exists() || $user->hasRole(['super-admin', 'cmo']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ambassador $ambassador): bool
    {
        return $ambassador->user->id == $user->id || $user->hasRole(['', 'cmo']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ambassador $ambassador): bool
    {
        return $ambassador->user->id == $user->id || $user->hasRole(['', 'cmo']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ambassador $ambassador): bool
    {
        return $ambassador->user->id == $user->id || $user->hasRole(['']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ambassador $ambassador): bool
    {
        return $user->hasRole(['']);
    }
}
