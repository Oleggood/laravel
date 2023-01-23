<h1>{{$main_header}}</h1>


<a href="{{ route('executor.index') }}">Назад к списку</a>


@foreach($oneUser as $user)

    <p>{{$user->surname}} {{$user->name}} {{$user->patronymic}}</p>

    <p>Отображать статусы:</p> {{-- todo - фильтр должен работать независимо от фильтраций таблицы --}}
    <form action="" method="get">
        @foreach($user->tasks as $userTasks)
            <input type="checkbox" name="{{$userTasks->status->id}}">{{$userTasks->status->status}}
        @endforeach
            <input type="submit" value="Фильтровать">
    </form>

    <table>
        <tr>
            <th>№</th>
            <th>Дата док-та (задачи)</th>
            <th>Номер док-та</th>
            <th>Наименование док-та</th>
            <th>Пункт</th>
            <th>Текст поручения</th>
            <th>Примечание (рег.№)</th>
            <th>Крайняя дата исп-ия</th>
            <th>Текущий статус</th>
        </tr>
        @foreach($user->tasks as $userTasks)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{date('d.m.Y', strtotime($userTasks->task_date))}}</td>
                <td>{{$userTasks->number}}</td>
                <td>{{$userTasks->task_name}}</td>
                <td>{{$userTasks->item}}</td>
                <td>{{$userTasks->task}}</td>
                <td><i>{{$userTasks->note}}</i></td>
                <td>
                    <span style="
                        @if ($userTasks->deadline <= today())
                           {{$color_text}}
                        @endif
                        ">{{date('d.m.Y', strtotime($userTasks->deadline))}}
                    </span>
                </td>
                <td>{{$userTasks->status->status}}</td>
            </tr>

        @endforeach
    </table>
@endforeach
