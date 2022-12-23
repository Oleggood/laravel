@extends('admin.layouts.main')

@section('page_header')
    Добавить роль пользователя (сотрудника)
@endsection

@section('content')
    <form class="" name="feedback" method="POST" action="{{route('role.store')}}">
        @csrf
        <div>Роль</div>
        <input type="text" name="role">
        <br><br>
        <input type="submit" name="submit_btn" value="Сохранить">
    </form>
@endsection
