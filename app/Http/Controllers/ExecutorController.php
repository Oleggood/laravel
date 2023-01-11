<?php

namespace App\Http\Controllers;

use App\Models\User;

class ExecutorController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('public.executor.index', [
            'main_header' => 'Пользователи',
            'users' => $users,
        ]);
    }


    public function show($user)
    {
        $oneUser = User::where('id', $user)->with('tasks')->get();

        return view('public.executor.show', [
            'main_header' => 'Задачи пользователя',
            'oneUser' => $oneUser,
            'color_text' => 'color:red',
        ]);
    }
}
