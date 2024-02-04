<?php

namespace App\Policies;

use App\Enums\Admin\Permissions\RolePermissionsEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::VIEW_ANY->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::VIEW->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::CREATE->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::UPDATE->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        if ($role->users()->count()) {
            return false;
        }

        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::DELETE->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::RESTORE->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        if ($role->users()->count()) {
            return false;
        }

        if ($user->hasRole(\App\Enums\Admin\RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(RolePermissionsEnum::FORCE_DELETE->value);
    }
}
