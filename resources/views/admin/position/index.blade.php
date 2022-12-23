@extends('admin.layouts.main')

@section('page_header')
    Должности
@endsection

@section('content')

<h3><a href="{{route('positions.create')}}">Добавить должность</a></h3>

    <table>
        <tr>
            <th><a href="{{route('positions.index')}}">ID</a></th>
            <th>Наименование должности</th>
            <th>Должность руководящая</th>
            {{--   <th>Должность заместителя руководителя</th>    --}}
        </tr>

        @foreach ($positions as $position)
            <tr>

                <td><a href="{{route('positions.show', $position->id)}}">{{$position->id}}</a></td>

                <td>{{$position->position}}</td>
                <td>
                    @if ($position->is_director == 1)
                        <span>да</span>
                    @else
                        <span>нет</span>
                    @endif
                </td>
                {{--
                <td>
                    @if ($position->is_deputy_director == 1)
                        <span>да</span>
                    @else
                        <span>нет</span>
                    @endif
                </td>
                --}}
            </tr>
        @endforeach
    </table>
@endsection
