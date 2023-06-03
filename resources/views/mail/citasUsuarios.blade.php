<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita Usuario</title>
</head>
<body>
    <h1>Buenas, {{Auth::user()->nombre}}</h1><br>
    <p>Tu cita ha sido programada con exito para el dia {{$dia}} de {{$mes}} a las {{$hora.':'.$minutos}}.
</body>
</html>