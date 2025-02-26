<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\RolePermissionService;

class RoleController extends Controller
{
    private RolePermissionService $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $roles = $this->rolePermissionService->getAllRoles();

        return Inertia::render('Role/Index', compact('roles'));
    }
}
