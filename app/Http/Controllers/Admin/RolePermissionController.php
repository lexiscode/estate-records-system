<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;


class RolePermissionController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:role-permission index,web')->only('index');
        $this->middleware('role_or_permission:role-permission create,web')->only('create', 'store');
        $this->middleware('role_or_permission:role-permission update,web')->only('edit', 'update');
        $this->middleware('role_or_permission:role-permission delete,web')->only('destroy');
    }


    public function index()
    {
        $roles = Role::simplePaginate(5);

        return view('web.backend.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');

        return view('web.backend.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'web', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        return redirect()->route('role.index')
        ->with('success', 'Role permissions has been created successfully!');
    }

    public function edit(string $id)
    {
        $permissions = Permission::all()->groupBy('group_name');

        $role = Role::findOrFail($id);

        $rolePermissions = $role->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        return view('web.backend.roles.edit', compact('permissions', 'role', 'rolePermissions'));

    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        // Create a role dynamically for users authenticating with the admin guard:
        $role = Role::findOrFail($id);

        /* blocks other users from accessing Super Admin's update functionality via url
        if($role->name === 'Super Admin'){
            return redirect()->route('role.index')->with('update-error', 'You cannot edit access rights of the Super Admin!');
        }
        */

        $role->update(['guard_name' => 'web', 'name' => $request->role]);

        // Assign multiple permissions to the role
        $role->syncPermissions($request->permissions); // from the permissions[] name

        return redirect()->route('role.index')
        ->with('success', 'Role permissions has been updated successfully!');
    }

    public function destroy(string $id)
    {
        try{
            $role = Role::findOrFail($id);

            // blocks other users from accessing Super Admin's delete functionality via url
            if ($role->name === 'Super Admin'){
                return response(['status' => 'error', 'message' => __('Can\'t Delete This One!')]);
            }

            $role->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}

