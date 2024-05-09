<?php

namespace App\Policies;

use App\Models\StudyPlan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudyPlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-study-plans');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-study-plans');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudyPlan $studyPlan): bool
    {
        return $user->hasPermission('edit-study-plans');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudyPlan $studyPlan): bool
    {
        return $user->hasPermission('delete-study-plans');
    }
}
