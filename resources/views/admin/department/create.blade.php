@extends('admin.layouts.main')

@section('page_header')
    Добавить структурное подразделение
@endsection



@section('content')
    <form class="" name="feedback" method="POST" action="{{route('departments.store')}}">
        @csrf
        <div>Сокращенное наименование подразделения</div>
        <input type="text" name="department">
        <br><br>
        <div>Примечание</div>
        <input type="text" name="note">
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
