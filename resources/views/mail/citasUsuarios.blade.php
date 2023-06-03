<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita Usuario</title>
</head>
<body>
    <h1>Buenas, {{$user}}</h1><br>
    <p>Tu cita ha sido programada con exito para el dia {{$dia}} de {{$mes}} a las {{$hora.':'.$minutos}}. En las oficinas de Visualseyra. <br></p>
    <p>Enlace a Google Maps: <a href="https://www.google.es/maps/place/Visualseyra/@41.58422,1.6025197,17z/data=!4m6!3m5!1s0x12a469fb9a7b2489:0x12b6233be1e36f61!8m2!3d41.58422!4d1.6051!16s%2Fg%2F11c30w1g6f?hl=es&entry=ttu">Oficinas VisualSeyra</a></p>
</body>
</html>