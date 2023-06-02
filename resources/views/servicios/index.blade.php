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
    <div class="col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('img/'.$servicio->image) }}" alt="Servicio 3">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title font-weight-bold">{{$servicio->nombre}}</h3>
          <p class="card-text">{{$servicio->descripcion}}</p>
          <div class="mt-auto">
              <a href="{{route('servicio.packs', $servicio->id)}}" class="btn btn-primary">Ver Packs</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection