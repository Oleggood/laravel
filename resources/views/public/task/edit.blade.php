@extends('layouts.main')

@section('page_header')
    <h1>{{$main_header}}</h1>
@endsection

@section('content')
    <form class="" name="feedback" method="POST" action="{{route('task.update', $task->id)}}">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$task->id}}">

        <div>Дата задачи (документа)</div>
        <input type="date" name="task_date" value="{{$task->task_date}}">
        @error('task_date')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Номер документа</div>
        <input type="text" name="number" value="{{$task->number}}">
        <div>Наименование документа/поручения</div>
        <input type="text" name="task_name" value="{{$task->task_name}}">
        @error('task_name')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Пункт</div>
        <input type="text" name="item" value="{{$task->item}}">
        <div>Текст поручения</div>
        <textarea name="task">{{$task->task}}</textarea>
        @error('task')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Примечание</div>
        <textarea name="note">{{$task->note}}</textarea>
        <br>
        <div>Крайняя дата исполнения</div>
        <input type="date" name="deadline" value="{{$task->deadline}}">
        @error('deadline')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <br>
        <div>Статус задачи</div>
        <select name="task_status_id">
            @foreach ($statuses as $status)
                <option {{$status->id === $task->status->id ? 'selected' : ''}}
                        value="{{$status->id}}">
                    {{$status->status}}
                </option>
            @endforeach
        </select>
        <br>
        <div>Исполнители</div>
        <br>
            @foreach ($allUsers as $user)
                <p>
                    <input type="checkbox" name="users[]" value="{{$user->id}}"
                        @foreach ($task->users as $item)
                            @checked($user->id === $item->id)
                        @endforeach/>
                    <span>{{$user->surname}} {{$user->name}} ({{$user->nickname}})</span>
                </p>
            @endforeach


        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
    <br>
    <a href="{{route('task.index')}}">Отмена - назад к списку</a>
@endsection
