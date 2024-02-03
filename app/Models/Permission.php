<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    /**
     * Allowed permissions
     *
     * @param boolean $merge
     * @return array
     */
    public static function allowedPermissions(bool $merge = true)
    {
        $registerPermissions = [
            \App\Enums\Admin\Permissions\UserPermissionsEnum::cases(),
            \App\Enums\Admin\Permissions\RolePermissionsEnum::cases()
        ];

        if ($merge) {
            $merged = [];

            array_map(function ($rp) use (&$merged) {
                $merged = [
                    ...$merged,
                    ...$rp
                ];
            }, $registerPermissions);

            $registerPermissions = $merged;
        }

        return $registerPermissions;
    }
}
