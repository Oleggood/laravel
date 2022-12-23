<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система контроля</title>
</head>
<body>
    <header>
        <h1>Панель администратора</h1>
        <nav>
            <div class="container">
                <div class="row">
                   <div>
                        <ul>
                            <li><a href="{{route('task.index')}}">Публичная часть</a></li>
                            <br><hr><br>
                            <li><a href="{{route('users')}}">Пользователи</a></li>
                            <li><a href="{{route('departments.index')}}">Словарь структурных подразделений</a></li>
                            <li><a href="{{route('positions.index')}}">Словарь должностей</a></li>
                            <li><a href="{{route('roles')}}">Словарь ролей</a></li>
                            <li><a href="{{route('status.index')}}">Словарь статусов задач</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <h2>
        @yield('page_header')
    </h2>
    @yield('content')
    <br><br> <br><br>
    <hr>

</body>
</html>
