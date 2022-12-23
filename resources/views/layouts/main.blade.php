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
        <nav>
            <div class="container">
                <div class="row">
                   <div>
                        <ul>
                            <li><a href="{{route('task.index')}}">Задачи</a></li>
                            <li><a href="#">Исполнители</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <hr>
    @yield('page_header')
    @yield('content')

</body>
</html>
