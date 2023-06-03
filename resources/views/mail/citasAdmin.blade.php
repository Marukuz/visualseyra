<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita Admin</title>
</head>
<body>
    <h1>Buenas, {{$admin}}</h1><br>
    <p>{{$user}} ha programado una cita para el dia {{$dia}} de {{$mes}} a las {{$hora.':'.$minutos}}. Si quieres mas informacion puedes revisars el <a href="{{route('agenda.index')}}">calendario</a>.
</body>
</html>