@extends('admin.layouts.main')

@section('page_header')
    Статус:
@endsection

@section('content')


        <a href="{{route('status.edit', $status->id)}}">Изменить статус</a><br><br>

    <form action="{{route('status.destroy', $status->id)}}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить статус">
    </form>




     <table>
        <tr>
            <th>ID</th>
            <th>Статус</th>
        </tr>

        <tr>
            <td>{{$status->id}}</td>
            <td>{{$status->status}}</td>
        </tr>

    </table>
@endsection
