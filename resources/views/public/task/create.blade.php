@extends('layouts.main')

@section('page_header')
    <h1>{{$main_header}}</h1>
@endsection

@section('content')
    <form class="" name="feedback" method="POST" action="{{route('task.store')}}">
        @csrf
        <div>Дата задачи (документа)</div>
        <input type="date" name="task_date">
        <div>Номер документа</div>
        <input type="text" name="number">
        <div>Наименование документа/поручения</div>
        <input type="text" name="task_name">
        <div>Пункт</div>
        <input type="text" name="item">
        <div>Текст поручения</div>
        <textarea name="task"></textarea>
        <div>Примечание</div>
        <textarea name="note"></textarea>
        <div>Крайняя дата исполнения</div>
        <input type="date" name="deadline">


        <div>Исполнители</div>
        @foreach ($users as $user)
            <p>
                <input type="checkbox" name="users[]" value="{{$user->id}}"><span> -{{$user->nickname}} ({{$user->name}})</span>
            </p>
        @endforeach


        <div>Статус задачи</div>
        <select name="task_status_id">
            @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{$status->status}}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
