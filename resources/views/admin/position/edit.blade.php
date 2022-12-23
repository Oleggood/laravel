@extends('admin.layouts.main')

@section('page_header')
    Изменить должность
@endsection

@section('content')


<form class="" name="feedback1" method="POST" action="{{route('positions.update', $position->id)}}">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$position->id}}">
    <div>Наименование должности</div>
    <input type="text" name="position" value="{{$position->position}}">
    <br><br>

    <div>Является руководителем</div>
    <input type="hidden" name="is_director" value="0">
    <input type="checkbox"
    name="is_director"
    value="1"
    @checked(old('is_director', $position->is_director)) />



    <br><br>
     {{--
    <div>Является ли заместителем руководителя?</div>
    <select name="is_deputy_director">
        <option value="0">нет</option>
        <option value="1">да</option>
    </select>
    <br><br>
    --}}
    <input type="submit" name="submit_btn" value="Сохранить">
  </form>
@endsection
