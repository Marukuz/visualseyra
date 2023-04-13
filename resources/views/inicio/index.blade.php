@extends('plantilla')
@section('contenido')
<!-- Imagen principal -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://visualseyra.com/wp-content/uploads/2017/10/img-home.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>
<main>
    <!-- Contenido principal -->
    <div class="container my-5">
        <h1>Bienvenidos a mi página de fotografía</h1>
        <p>En esta página encontrarás mi trabajo como fotógrafo profesional. Me especializo en retratos, fotografía de paisajes y eventos especiales. Espero que disfrutes de mi galería y que te animes a contactarme para trabajar juntos.</p>
        <a href="#" class="btn btn-primary">Contáctame</a>
    </div>
</main>
@endsection
@section('styles')
<style>
    #imagen{
        background-size: cover;
        background-position: center;
    }
</style>
@endsection