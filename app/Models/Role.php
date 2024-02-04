<?php

namespace App\Models;

use App\Enums\Admin\RolesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    /**
     * Is protected
     *
     * @return bool
     */
    function isProtected()
    {
        return in_array($this->name, array_map(fn($i) => $i->value, RolesEnum::cases()));
    }

    /**
     * Is super
     *
     * @return bool
     */
    function isSuper()
    {
        return $this->name == RolesEnum::SUPER->value;
    }
}
