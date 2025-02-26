<?php

namespace App\Services;

use App\Models\Module;
use Spatie\Permission\Models\Role;

class RolePermissionService
{
    public function getAllModule()
    {
        return Module::paginate(10);
    }

    public function getAllRoles()
    {
        return Role::paginate(10);
    }
}
