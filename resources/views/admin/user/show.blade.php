@extends('admin.layouts.main')

@section('page_header')
    Пользователь:
@endsection

@section('content')
    <a href="{{route('user.edit', $user->id)}}">Изменить пользователя</a><br><br>
    <form action="{{route('user.destroy', $user->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить пользователя">
    </form>
     <table>
        <tr>
            <th>ID</th>
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

        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->patronymic}}</td>
            <td>{{date('d.m.Y', strtotime($user->birthday));}}</td>
            <td>{{$user->nickname}}</td>
            <td>
                @if ($user->is_not_fired == true)
                    <span>работает</span>
                @else
                    <span>уволен</span>
                @endif
            </td>
            <td>{{$user->login}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->note}}</td>
            <td>{{$user->department->department}}</td> {{-- значение из другой таблицы--}}
            <td>{{$user->position->position}}</td> {{-- значение из другой таблицы--}}
            <td>
                @if ($user->position->is_director == 1)
                <span>да</span>
                @else
                <span>нет</span>
                @endif
            </td> {{-- значение из другой таблицы--}}
            <td>{{$user->role->role}}</td> {{-- значение из другой таблицы--}}
        </tr>

    </table>
@endsection
