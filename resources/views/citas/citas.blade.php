@extends('plantillaCitas')
@section('contenido')
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Detalles de la Cita</h2>
    </div>
    <div class="card-body">
      <p class="card-text-label">Fecha:</p>
      <p class="card-text-value">{{$fecha}}</p>
      <p class="card-text-label">Hora:</p>
      <p class="card-text-value">{{$hora}}</p>
      <p class="card-text-label">Lugar:</p>
      <p class="card-text-value"><a href="https://www.google.es/maps/place/Visualseyra/@41.58422,1.6043329,18z/data=!3m1!4b1!4m6!3m5!1s0x12a469fb9a7b2489:0x12b6233be1e36f61!8m2!3d41.58422!4d1.6051!16s%2Fg%2F11c30w1g6f?hl=es&entry=ttu">Oficinas de VisualSeyra</a></p>
      <p class="card-text-label">Motivo:</p>
      <p class="card-text-value">{{$cita->descripcion}}</p>
      <button class="btn">Modificar Cita</button>
    </div>
  </div>
@endsection