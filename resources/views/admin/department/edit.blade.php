@extends('admin.layouts.main')

@section('page_header')
    Изменить подразделение
@endsection

@section('content')


<form class="" name="feedback1" method="POST" action="{{route('departments.update', $department->id)}}">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$department->id}}">
    <div>Наименование подразделения</div>
    <input type="text" name="department" value="{{$department->department}}">
    <br><br>
    <div>Примечание</div>
    <input type="text" name="note" value="{{$department->note}}">



    <br><br>

    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
