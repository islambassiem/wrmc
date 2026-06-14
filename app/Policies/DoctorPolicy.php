<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\Permission;
use App\Models\Doctor;
use App\Models\User;

class DoctorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(Permission::DOCTOR_VIEW_ALL);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Doctor $doctor): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(Permission::DOCTOR_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Doctor $doctor): bool
    {
        return $user->hasPermissionTo(Permission::DOCTOR_UPDATE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Doctor $doctor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Doctor $doctor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Doctor $doctor): bool
    {
        return false;
    }
}
