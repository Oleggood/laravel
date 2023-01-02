@extends('admin.layouts.main')

@section('page_header')
    Роль:
    <p style="color: red">Внимание! Изменение ID/удаление ролей пользователей может привести к потере работоспособности всей системы!</p>
@endsection

@section('content')

    <a href="{{route('role.edit', $role->id)}}">Изменить роль</a><br><br>

    <form action="{{route('role.destroy', $role->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить роль">
    </form>


     <table>
        <tr>
            <th>ID</th>
            <th>Роль</th>

        </tr>

        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->role}}</td>

        </tr>

    </table>
@endsection
