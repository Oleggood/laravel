@extends('admin.layouts.main')

@section('page_header')
    Добавить должность
@endsection

@section('content')
    <form class="" name="feedback" method="POST" action="{{route('positions.store')}}">
        @csrf
        <div>Наименование должности</div>
        <input type="text" name="position">
        <br><br>
        <div>Является руководителем</div>
        <input type="hidden" name="is_director" value="0">
        <input type="checkbox" name="is_director" value="1">
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
