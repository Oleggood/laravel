@extends('admin.layouts.main')

@section('page_header')
    Статусы задач
@endsection

@section('content')
<h3><a href="{{route('status.create')}}">Добавить статус</a></h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Статус</th>
        </tr>

        @foreach ($statuses as $status)
            <tr>
                <td><a href="{{route('status.show', $status->id)}}">{{$status->id}}</a></td>
                <td>{{$status->status}}</td>
            </tr>
        @endforeach
    </table>
@endsection
