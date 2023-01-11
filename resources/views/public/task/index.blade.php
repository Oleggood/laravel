@extends('layouts.main')

@section('page_header')
    <h1>{{$main_header}}</h1>
@endsection

@section('filter')
    <p>место для фильтра - скрыть задачи с определенным статусом</p>
@endsection

@section('content')

<h3><a href="{{route('task.create')}}">Добавить задачу</a></h3>
    <table>
        <tr>
            <th><a href="{{route('task.index')}}">ID</a></th> {{-- todo - заменить на номер итерации цикла--}}
            <th>Дата док-та (задачи)</th>
            <th>Номер док-та</th>
            <th>Наименование док-та</th>
            <th>Пункт</th>
            <th>Текст поручения</th>
            <th>Примечание</th>
            <th>Исполнители</th>
            <th>Крайняя дата исп-ия</th>
            <th>Текущий статус</th>
            <th>Изменить задачу</th>
            <th>Удалить задачу</th>
        </tr>

        @foreach ($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{date('d.m.Y', strtotime($task->task_date))}}</td>
                <td>{{$task->number}}</td>
                <td>{{$task->task_name}}</td>
                <td>{{$task->item}}</td>
                <td>{{$task->task}}</td>
                <td><i>{{$task->note}}</i></td>

                <td>
                        @foreach ($task->users as $user)
                            <span>{{$user->surname}} {{$user->name}} ({{$user->nickname}})</span>
                            <br>
                        @endforeach
                </td>

                <td>
                    <span style="
                        @if ($task->deadline <= today())
                           {{$color_text}}
                        @endif
                        ">{{date('d.m.Y', strtotime($task->deadline))}}
                    </span>
                </td>

                <td>{{$task->status->status}}</td>

                <td>
                    <a href="{{route('task.edit', $task->id)}}">

                            <svg enable-background="new 0 0 40 40" height="40px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="64px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g><path d="M55.736,13.636l-4.368-4.362c-0.451-0.451-1.044-0.677-1.636-0.677c-0.592,0-1.184,0.225-1.635,0.676l-3.494,3.484   l7.639,7.626l3.494-3.483C56.639,15.998,56.639,14.535,55.736,13.636z"/>
                                    <polygon points="21.922,35.396 29.562,43.023 50.607,22.017 42.967,14.39  "/><polygon points="20.273,37.028 18.642,46.28 27.913,44.654  "/>
                                        <path d="M41.393,50.403H12.587V21.597h20.329l5.01-5H10.82c-1.779,0-3.234,1.455-3.234,3.234v32.339   c0,1.779,1.455,3.234,3.234,3.234h32.339c1.779,0,3.234-1.455,3.234-3.234V29.049l-5,4.991V50.403z"/>
                                </g>
                            </svg>
                    </a>
                </td>
                <td>
                    <form action="{{route('task.destroy', $task->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="УДАЛИТЬ">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
