<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Services\RolePermissionService;

class RoleController extends Controller
{
    private RolePermissionService $rolePermissionService;

    /**
     * RoleController constructor.
     */
    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->rolePermissionService->getAllRoles();

        return Inertia::render('Role/Index', compact('roles'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $modules = $this->rolePermissionService->getAllModule();

        return Inertia::render('Role/Create', compact('modules'));
    }
}
