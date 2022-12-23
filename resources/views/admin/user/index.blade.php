@extends('admin.layouts.main')

@section('page_header')
    Пользователи (сотрудники)
@endsection

@section('content')


    <h3><a href="{{route('user_create')}}">Добавить пользователя</a></h3>
    <table>

        <tr>
            <th><a href="{{route('users')}}">ID</a></th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Кличка</th>
            <th>Не уволен ли</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Примечание</th>
            <th>Стр.подразделение</th>
            <th>Должность</th>
            <th>Руководитель</th>
            <th>Роль</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>
                    <a href="{{route('user.show', $user->id)}}">{{$user->id}}</a>
                </td>
                <td>{{$user->surname}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->patronymic}}</td>
                <td>{{date('d.m.Y', strtotime($user->birthday));}}</td>
                <td>{{$user->nickname}}</td>
                <td>
                    @if ($user->is_not_fired == 1)
                        <span>работает</span>
                     @else
                        <span>уволен</span>
                    @endif
                </td>
                <td>{{$user->login}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->note}}</td>
                <td>{{$user->department->department}}</td> {{-- значение из таблицы подразделений--}}
                <td>{{$user->position->position}}</td> {{-- значение из таблицы должностей--}}
                <td> {{-- значение из таблицы должностей--}}
                    @if ($user->position->is_director == 1)
                        <span>да</span>
                    @else
                        <span>нет</span>
                    @endif
                </td>
                <td>{{$user->role->role}}</td> {{-- значение из таблицы ролей--}}
            </tr>
        @endforeach
    </table>
@endsection
