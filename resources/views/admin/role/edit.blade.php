@extends('admin.layouts.main')

@section('page_header')
    Изменить данные роли
@endsection

@section('content')
<form class="" name="feedback1" method="POST" action="{{route('role.update', $role->id)}}">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$role->id}}">


    <div>Роль</div>
    <input type="text" name="role" value="{{$role->role}}">
    <br><br>
    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
