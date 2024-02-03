<?php

namespace Database\Seeders;

use App\Enums\Admin\Permissions\UserPermissionsEnum;
use App\Enums\Admin\RolesEnum;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Register roles
        foreach (RolesEnum::cases() as $role) {
            Role::create([
                'name' => $role->value
            ]);
        }

        // register permissions
        foreach (Permission::allowedPermissions(true) as $permission) {
            Permission::create([
                'name' => $permission->value
            ]);
        }

        (Role::findByName(RolesEnum::SUPER->value))
            ->givePermissionTo(UserPermissionsEnum::ADMIN_ACCESS->value);

        (Role::findByName(RolesEnum::ADMIN->value))
            ->givePermissionTo(UserPermissionsEnum::ADMIN_ACCESS->value);
    }
}
