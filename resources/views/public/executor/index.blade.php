@extends('layouts.main')

@section('page_header')
    <h1>{{$main_header}}</h1>
@endsection

@section('filter')
<p>место для фильтра???</p>
@endsection

@section('content')

    <table>
        <tr>
            <th>№</th>
            <th>Кличка</th>
            <th>ФИО</th>
            <th>Подразделение</th>
            <th>Количество задач <br>(все статусы)</th>
            {{-- <th>Количество задач на сегодня</th>
            <th>Количество просроченных задач</th>--}}
        </tr>


        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="{{route('executor.show', $user->id)}}">{{$user->nickname}}</a></td>
                <td>
                    <a href="{{route('executor.show', $user->id)}}">{{$user->surname}} {{$user->name}} {{mb_substr(($user->patronymic),0,1,"UTF-8")}}.</a></td>
                <td>{{$user->department->department}}</td>
                <td style="text-align: center">
                    @forelse ($user->tasks as $tasks)
                        {{$loop->count}}
                        @break
                    @empty
                        нет
                    @endforelse
                </td>
            </tr>
        @endforeach


    </table>
@endsection
