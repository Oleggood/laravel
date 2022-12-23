@extends('admin.layouts.main')

@section('page_header')
    Подразделение:
@endsection

@section('content')


        <a href="{{route('departments.edit', $department->id)}}">Изменить подразделение</a><br><br>

    <form action="{{route('departments.destroy', $department->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить подразделение">
    </form>




     <table>
        <tr>
            <th>ID</th>
            <th>Наименование подразделения</th>
            <th>Примечание</th>
        </tr>

        <tr>
            <td>{{$department->id}}</td>
            <td>{{$department->department}}</td>
            <td>{{$department->note}}</td>
        </tr>

    </table>
@endsection
