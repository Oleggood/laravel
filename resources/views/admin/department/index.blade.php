@extends('admin.layouts.main')

@section('page_header')
    Структурные подразделения
@endsection

@section('content')
<h3><a href="{{route('departments.create')}}">Добавить подразделение</a></h3>

    <table>
        <tr>
            <th><a href="{{route('departments.index')}}">ID</a></th>
            <th>Наименование подразделения</th>
            <th>Примечание</th>
        </tr>

        @foreach ($departments as $department)
            <tr>
                <td><a href="{{route('departments.show', $department->id)}}">{{$department->id}}</a></td>
                <td>{{$department->department}}</td>
                <td>{{$department->note}}</td>
            </tr>
        @endforeach
    </table>
@endsection
