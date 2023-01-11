<h1>{{$main_header}}</h1>
@dd($user)
@forelse ($user->tasks as $tasks)
    {{$loop->count}}
    {{$tasks->task_name}}

@empty
    нет
@endforelse
