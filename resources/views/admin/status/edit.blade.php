@extends('admin.layouts.main')

@section('page_header')
    Изменить статус
@endsection

@section('content')


<form class="" name="feedback1" method="POST" action="{{route('status.update', $status->id)}}">
    @csrf
    @method('patch')
    {{--
    <input type="hidden" name="id" value="{{$status->id}}">
    --}}
    <div>Статус</div>
    <input type="text" name="status" value="{{$status->status}}">

    <br><br>

    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
