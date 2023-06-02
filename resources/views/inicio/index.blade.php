@extends('plantilla')
@section('contenido')
  <!-- Imagen principal -->
  <div class="container-fluid px-0">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/carrousel1.jpg') }}" alt="Videografía y Fotografía">
          <div class="carousel-caption d-md-block">
            <h1 class="display-3 font-weight-bold text-light mb-3">Videografía y Fotografía</h1>
            <p class="lead text-light mb-5">Capturamos tus mejores momentos</p>
            <a href="#" class="btn btn-primary btn-lg">Conócenos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Imagen principal -->

  <!-- Servicios -->
  <div class="container my-5">
    <h2 class="text-center mb-5">Nuestros servicios</h2>
    <div class="row">
      @foreach($servicios as $servicio)
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('img/'.$servicio->image) }}" alt="Servicio 3">
          <div class="card-body d-flex flex-column">
            <h3 class="card-title font-weight-bold">{{$servicio->nombre}}</h3>
            <p class="card-text">{{$servicio->descripcion}}</p>
            <div class="mt-auto">
              <a class="btn btn-primary" href="{{route('servicio.index')}}">Detalles</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- /Servicios -->
<!-- Galería -->
<div class="container-fluid bg-light py-5">
  <h2 class="text-center mb-5">Nuestra galería</h2>
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <h3>Bodas</h1>
      <a href="https://via.placeholder.com/1200x800" data-toggle="lightbox" data-gallery="galeria-1" data-title="Foto 1" class="d-block">
        <img class="img-fluid" src="https://via.placeholder.com/600x400" alt="Foto 1">
      </a>
    </div>
    <div class="col-md-4 mb-4">
      <h3>Comuniones</h1>
      <a href="https://via.placeholder.com/1200x800" data-toggle="lightbox" data-gallery="galeria-1" data-title="Foto 2" class="d-block">
        <img class="img-fluid" src="https://via.placeholder.com/600x400" alt="Foto 2">
      </a>
    </div>
    <div class="col-md-4 mb-4">
      <h3>Albumes</h1>
      <a href="https://via.placeholder.com/1200x800" data-toggle="lightbox" data-gallery="galeria-1" data-title="Foto 3" class="d-block">
        <img class="img-fluid" src="https://via.placeholder.com/600x400" alt="Foto 3">
      </a>
    </div>
  </div>
</div>



@endsection