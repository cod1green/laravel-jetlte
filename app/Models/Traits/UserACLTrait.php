<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{

    /**
     * hasPermission
     */
    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    /**
     * Permissions
     */
    public function permissions()
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];

        $permissions = array_intersect($permissionsRole, $permissionsPlan);

        // foreach($permissionsRole as $permissionRole) {
        //     if (in_array($permissionRole->name, $permissionsPlan))
        //         array_push($permissions, $permissionsPlan);
        // }

        return $permissions;
    }

    /**
     * PermissionsPlan
     */
    public function permissionsPlan()
    {
        // $tenant = $this->tenant;
        // $plan = $tenant->plan;

        $tenant = Tenant::with('plan.groups.permissions')->where('id', $this->tenant_id)->first();

        $plan = $tenant->plan;

        $permissions = [];

        foreach ($plan->groups as $group) {
            foreach ($group->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    /**
     * PermissionsPlan
     */
    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function isNotAdmin(): bool
    {
        return !$this->isAdmin();
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('admin.admins'));
    }
}
