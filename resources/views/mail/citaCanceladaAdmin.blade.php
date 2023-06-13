<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita Cancelada</title>
</head>
<body>
    <h1>Buenas, {{$admin}}</h1><br>
    <p>El usuario {{$user}} ha cancelado la cita programada para el {{$dia}} de {{$mes}} a las {{$hora.':'.$minutos}}. Si quieres mas informacion puedes revisar el <a href="{{route('agenda.index')}}">calendario</a>.
</body>
</html>