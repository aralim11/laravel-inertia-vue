<?php

namespace App\Services;

use App\Models\Module;
use Spatie\Permission\Models\Role;

class RolePermissionService
{
    /**
     * Get all modules
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllModule()
    {
        return Module::paginate(10);
    }

    /**
     * Get all roles
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllRoles()
    {
        return Role::with('permissions')->paginate(10);
    }
}
