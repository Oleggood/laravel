@extends('admin.layouts.main')

@section('page_header')
    Должность:
@endsection

@section('content')


        <a href="{{route('positions.edit', $position->id)}}">Изменить должность</a><br><br>

    <form action="{{route('positions.destroy', $position->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить должность">
    </form>



     <table>
        <tr>
            <th>ID</th>
            <th>Наименование должности</th>
            <th>Должность руководящая</th>
             {{--   <th>Должность заместителя руководителя</th>    --}}
        </tr>

        <tr>
            <td>{{$position->id}}</td>
            <td>{{$position->position}}</td>
            <td>
                    @if ($position->is_director == 1)
                        <span>да</span>
                    @else
                        <span>нет</span>
                    @endif
            </td>
             {{--   <td>
                @if ($position->is_deputy_director == 1)
                <span>да</span>
                @else
                <span>нет</span>
                @endif
            </td>--}}
        </tr>

    </table>
@endsection
