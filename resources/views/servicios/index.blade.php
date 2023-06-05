@extends('plantilla')
@section('contenido')
<style>
  html,
  body {
    height: 100%;
  }
</style>
<section class="w-full bg-gray-200 flex-row justify-center text-center">
  <div class="container-fluid px-0">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item  active">
                  <img class="d-block w-100" src="{{ asset('img/carrousel3.jpg') }}" alt="Videografía y Fotografía">
                  <div class="carousel-caption d-md-block">
                      <h1 class="display-3 font-weight-bold text-light mb-3">Nuestros Servicios</h1>
                      <p class="lead text-light mb-5">Echale un vistazo a nuestros servicios.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<div class="container packs mt-5" style="display: flex; align-items: center; justify-content: center; height: 100%;">
  <div class="row">
    @foreach($servicios as $servicio)
    <div class="col-md-6 mb-4">
      <div class="card h-100 zoom-card">
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