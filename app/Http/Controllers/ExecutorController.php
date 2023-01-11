<?php

namespace App\Http\Controllers;

use App\Models\Executor;
use App\Models\Task;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

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


    public function show(User $user)
    {
        return view('public.executor.show', [
            'main_header' => 'Задачи пользователя',
            'user' => $user,
        ]);
    }
}
