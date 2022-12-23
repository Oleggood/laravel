@extends('admin.layouts.main')

@section('page_header')
    Уровень доступа пользователя (сотрудника)
@endsection

@section('content')
    <h3><a href="{{route('role.create')}}">Добавить роль</a></h3>
    <table>
        <tr>
            <th><a href="{{route('roles')}}">ID</a></th>
            <th>Роль</th>
        </tr>

        @foreach ($roles as $role)
            <tr>
                <td><a href="{{route('role.show', $role->id)}}">{{$role->id}}</a></td>
                <td>{{$role->role}}</td>
            </tr>
        @endforeach
    </table>
@endsection
