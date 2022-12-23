<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Position;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;

class UserController extends Controller
{
    public function index () {
        $users = User::all();

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function create () {
        $departments = Department::all();
        $positions = Position::all();
        $roles = Role::all();
        return view('admin.user.create', [
            'departments' => $departments,
            'positions' => $positions,
            'roles' => $roles,
        ]);

    }

    public function store (StoreUserRequest $request) {
        $user = new User;
        $user->fill($request->validated());
        //$user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users');
    }

    public function show (User $userId) {

        return view('admin.user.show', [
            'user' => $userId, //заменяется на compact('userId') ???
        ]);
    }


    public function edit (User $userId) {
        $departments = Department::all();
        $positions = Position::all();
        $roles = Role::all();

        return view('admin.user.edit', [
            'user' => $userId, //заменяется на compact('userId') ???
            'departments' => $departments,
            'positions' => $positions,
            'roles' => $roles,
        ]);
    }


    public function update (User $userId, StoreUserRequest $request) {
        $userId->update($request->validated());
        return redirect()->route('user.show', $userId->id);
    }

    public function destroy (User $userId) {
        $userId->delete();
        return redirect()->route('users');
    }

}
