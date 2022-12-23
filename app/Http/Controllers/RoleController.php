<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index () {
        $role = Role::all();
        return view('admin.role.index', [
            'roles' => $role,
        ]);
    }

    public function create () {
        return view('admin.role.create');
    }

    public function store (RoleRequest $request) {
        $role = new Role;
        $role->fill($request->validated());
        $role->save();
        return redirect()->route('roles');
    }

    public function show (Role $roleId) {
        return view('admin.role.show', [
            'role' => $roleId,
        ]);
    }

    public function edit(Role $roleId)
    {
        return view('admin.role.edit', [
            'role' => $roleId,
        ]);
    }

    public function update(Role $roleId, RoleRequest $request) {
        $roleId->update($request->validated());
        return redirect()->route('role.show', $roleId->id);
    }

    public function destroy(Role $roleId) {
        $roleId->delete();
        return redirect()->route('roles');
    }


}
