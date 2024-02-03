<?php

namespace App\Policies;

use App\Enums\Admin\Permissions\UserPermissionsEnum;
use App\Enums\Admin\RolesEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(UserPermissionsEnum::VIEW_ANY);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(UserPermissionsEnum::VIEW);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        return $user->hasPermissionTo(UserPermissionsEnum::CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        if (!$user->hasPermissionTo(UserPermissionsEnum::UPDATE)) {
            return false;
        }

        return $model->hasRole([RolesEnum::SUPER->value, RolesEnum::ADMIN->value]) ? false : true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return false;
        }

        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        if (!$user->hasPermissionTo(UserPermissionsEnum::DELETE)) {
            return false;
        }

        return $model->hasRole([RolesEnum::SUPER->value, RolesEnum::ADMIN->value]) ? false : true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return false;
        }

        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        if (!$user->hasPermissionTo(UserPermissionsEnum::RESTORE)) {
            return false;
        }

        return $model->hasRole([RolesEnum::SUPER->value, RolesEnum::ADMIN->value]) ? false : true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return false;
        }

        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        if (!$user->hasPermissionTo(UserPermissionsEnum::FORCE_DELETE)) {
            return false;
        }

        return $model->hasRole([RolesEnum::SUPER->value, RolesEnum::ADMIN->value]) ? false : true;
    }

    /**
     * Admin access
     *
     * @param User $user
     * @return boolean
     */
    public function adminAccess(User $user): bool
    {
        return $user->hasPermissionTo(UserPermissionsEnum::ADMIN_ACCESS->value);
    }

    /**
     * Permission edit
     *
     * @param User $user
     * @param User $model
     * @return boolean
     */
    public function permissionEdit(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return false;
        }

        if ($user->hasRole(RolesEnum::SUPER->value)) {
            return true;
        }

        if (!$user->hasPermissionTo(UserPermissionsEnum::PERMISSIONS_EDIT)) {
            return false;
        }

        return $model->hasRole([RolesEnum::SUPER->value, RolesEnum::ADMIN->value]) ? false : true;
    }
}
