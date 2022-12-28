<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\User;
use App\Http\Requests\StoreTaskRequest;
//use App\Http\Requests\UpdateTaskRequest;


class TaskController extends Controller
{

    public function index()
    {
        $task = Task::all();
        $color_text = 'color:red'; //todo - сделать через тернарный оператор или ИФ
        return view('public.task.index', [
            'tasks' =>  $task,
            'main_header' => 'Контроль управленческих решений',
            'color_text' => $color_text,
        ]);
    }


    public function create()
    {
        $statuses = Status::all();
        $users = User::all();

        return view('public.task.create', [
            'main_header' => 'Добавить задачу',
            'statuses' => $statuses,
            'users' => $users,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $item = $request->validated();
        $users = $item['users'];
        unset($item['users']);

        $task = Task::create($item);
        $task->users()->attach($users);



        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //не используется
    }


    public function edit(Task $task)
    {
        $statuses = Status::all();
        $allUsers = User::all();

        return view('public.task.edit', [
            'main_header' => 'Изменить задачу',
            'statuses' => $statuses,
            'task' => $task,
            'allUsers' => $allUsers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $item = $request->validated();
        $users = $item['users'];
        unset($item['users']);

        $task->update($item);

        $task->users()->sync($users);



        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
