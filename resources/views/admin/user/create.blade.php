@extends('admin.layouts.main')

@section('page_header')
    Добавить пользователя (сотрудника)
@endsection


@section('content')
<form class="" name="feedback" method="POST" action="{{route('user.store')}}">
    @csrf
    <div>Фамилия</div>
    <input type="text" name="surname">
    <div>Имя</div>
    <input type="text" name="name" required="required">
    <div>Отчество</div>
    <input type="text" name="patronymic">
    <div>Дата рождения</div>
    <input type="date" name="birthday">
    <div>Прозвище (поз-ой)</div>
    <input type="text" name="nickname" required="required">
    <div>Статус сотрудника</div>
    <select name="is_not_fired" required="required">
        <option value="true">Действующий</option>
        <option value="false">Уволен</option>
    </select>
    <div>Логин</div>
    <input type="text" name="login" required="required">
    <div>Пароль</div>
    <input type="password" name="password" required="required">
    <div>Примечание</div>
    <textarea name="note"></textarea>
    <div>Структурное подразделение</div>
    <select name="department_id">
        @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->department}}</option>
        @endforeach
    </select>
    <div>Должность</div>
    <select name="position_id">
        @foreach ($positions as $position)
            <option value="{{$position->id}}">{{$position->position}}</option>
        @endforeach
    </select>
    <div>Роль</div>
    <select name="role_id">
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->role}}</option>
        @endforeach
    </select>
    <br><br>
    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
