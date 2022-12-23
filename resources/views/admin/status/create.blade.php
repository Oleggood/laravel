@extends('admin.layouts.main')

@section('page_header')
    Добавить статус
@endsection



@section('content')
    <form class="" name="feedback" method="POST" action="{{route('status.store')}}">
        @csrf
        <div>Статус</div>
        <input type="text" name="status">
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
