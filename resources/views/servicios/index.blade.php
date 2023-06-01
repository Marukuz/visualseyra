@extends('plantilla')
@section('contenido')
<style>
  html,
  body {
    height: 100%;
  }
</style>

<div class="container packs" style="display: flex; align-items: center; justify-content: center; height: 100%;">
  <div class="row">
    @foreach($servicios as $servicio)
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('img/'.$servicio->image) }}" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">{{$servicio->nombre}}</h5>
          <p class="card-text">{{$servicio->descripcion}}</p>
          <a href="{{route('servicio.packs', $servicio->id)}}" class="btn btn-primary">Ver Packs</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection