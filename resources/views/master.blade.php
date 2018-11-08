<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>Test application</title>

</head>
    <body>
    <div class="container">

    <div class="row">
        <div class="col"></div>
        <div class="col"></br><a href="{{route('home')}}" class="btn btn-primary btn-sm">Главная</a></div>
        <div class="col"></br><a href="{{route('list-emp')}}" class="btn btn-primary btn-sm">Список сотрудников</a></div>
        <div class="col"></br><a href="{{route('list-dep')}}" class="btn btn-primary btn-sm">Список департаментов </a></div>
        <div class="col"></br><a href="{{route('add-emp')}}" class="btn btn-primary btn-sm">+ сотрудника</a></div>
        <div class="col"></br><a href="{{route('add-dep')}}" class="btn btn-primary btn-sm">+ департамент</a></div>
        <div class="col"></div>
    </div>


    <div class="row">

        <div class="col-sm-1"></div>
        <div class="col-sm">
            </br>

            @yield('content')
        </div>
        <div class="col-sm-1"></div>
    </div>



    </div>
    </body>
</html>
