@extends('layouts.main')

@section('page_header')
    <h1>{{$main_header}}</h1>
@endsection

@section('content')
    <form class="" name="feedback" method="POST" action="{{route('task.store')}}">
        @csrf
        <div>Дата задачи (документа)</div>
        <input type="date" name="task_date" value="{{old('task_date')}}">
        @error('task_date')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Номер документа</div>
        <input type="text" name="number">
        <div>Наименование документа/поручения</div>
        <input type="text" name="task_name" value="{{old('task_name')}}">
        @error('task_name')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Пункт</div>
        <input type="text" name="item">
        <div>Текст поручения</div>
        <textarea name="task">{{old('task')}}</textarea>
        @error('task')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror
        <div>Примечание (рег.№)</div>
        <textarea name="note"></textarea>
        <div>Крайняя дата исполнения</div>
        <input type="date" name="deadline" value="{{old('deadline')}}">
        @error('deadline')
        <i><span style="{{$text_error}}">{{$err_message}}</span></i>
        @enderror

{{--        todo - не работает, как надо - не подтягивает старые заполненные данные при ошибке валидации:  --}}
        <div>Исполнители</div>
        @foreach ($users as $user)
            <p>
                <input type="checkbox" name="users" value="{{$user->id}}"

                    @checked(old('users') == $user->id)

                />
                <span>{{$user->surname}} {{$user->name}} ({{$user->nickname}})</span>
            </p>
        @endforeach


        <div>Статус задачи</div>
        <select name="task_status_id">
            @foreach ($statuses as $status)
                <option
                    {{old('task_status_id') == $status->id ? ' selected' : ''}}
                    value="{{$status->id}}">{{$status->status}}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
