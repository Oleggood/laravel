@extends('admin.layouts.main')

@section('page_header')
    Изменить данные пользователя (сотрудника)
@endsection

{{-- todo - вывести сообщения об ошибках--}}

@section('content')
<form class="" name="feedback1" method="POST" action="{{route('user.update', $user->id)}}">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$user->id}}">


    <div>Фамилия</div>
    <input type="text" name="surname" value="{{$user->surname}}">
    <div>Имя</div>
    <input type="text" name="name" required="required" value="{{$user->name}}">
    <div>Отчество</div>
    <input type="text" name="patronymic" value="{{$user->patronymic}}">
    <div>Дата рождения</div>
    <input type="date" name="birthday" value="{{$user->birthday}}">
    <div>Прозвище (поз-ой)</div>
    <input type="text" name="nickname" required="required" value="{{$user->nickname}}">
    <div>Статус сотрудника</div>
    <select name="is_not_fired" required="required">
        <option value="true">Действующий</option>
        <option value="false">Уволен</option>
    </select>
    <div>Логин</div>
    <input type="text" name="login" required="required" value="{{$user->login}}">
    <div>Пароль</div>
    <input type="password" name="password" required="required" value="{{$user->password}}">
    <div>Примечание</div>
    <textarea name="note">{{$user->note}}</textarea>

    <div>Структурное подразделение</div>
    <select name="department_id">
        @foreach ($departments as $department)
            <option
            {{$department->id === $user->department->id ? 'selected' : ''}}
            value="{{$department->id}}">{{$department->department}}</option>
        @endforeach
    </select>
    <div>Должность</div>
    <select name="position_id">
        @foreach ($positions as $position)
            <option
            {{$position->id === $user->position->id ? 'selected' : ''}}
            value="{{$position->id}}">{{$position->position}}</option>
        @endforeach
    </select>
    <div>Роль</div>
    <select name="role_id">
        @foreach ($roles as $role)
            <option
            {{$role->id === $user->role->id ? 'selected' : ''}}
            value="{{$role->id}}">{{$role->role}}</option>
        @endforeach
    </select>

    <br><br>
    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
