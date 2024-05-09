<?php

namespace App\Policies;

use App\Models\Diploma;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DiplomaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-diplomas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-diplomas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Diploma $diploma): bool
    {
        return $user->hasPermission('edit-diplomas') || $user->id === $diploma->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Diploma $diploma): bool
    {
        return $user->hasPermission('delete-diplomas') || $user->id === $diploma->user_id;
    }
}
