<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class RolePermissionApiController extends Controller
{

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name')->map(function ($group) {
            return $group->map(function ($permission) {
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'guard_name' => $permission->guard_name,
                    'group_name' => $permission->group_name,
                    'created_at' => $permission->created_at->format('Y-m-d H:i:s'),
                ];
            });
        });

        // Return both permissions and roles in the response
        return response()->json([
            'permissions' => $permissions,
        ]);
    }

}

