@extends('plantilla')
@section('contenido')
<style>
    html, body {
        height: 100%;
    }
</style>

<div class="container packs" style="display: flex; align-items: center; justify-content: center; height: 100%;">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('../img/bodas.jpg') }}" class="card-img-top" alt="Servicio 1">
                <div class="card-body">
                    <h5 class="card-title">Bodas</h5>
                    <p class="card-text">Descripción del servicio 1.</p>
                    <a href="#" class="btn btn-primary comprarboda">Comprar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('../img/comuniones.jpg') }}" class="card-img-top" alt="Servicio 2">
                <div class="card-body">
                    <h5 class="card-title">Comuniones</h5>
                    <p class="card-text">Descripción del servicio 2.</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bodapacks" style="display: flex; align-items: center; justify-content: center; height: 100%;">
    <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{ asset('../img/servicio1.jpg') }}" class="card-img-top" alt="Servicio 1">
              <div class="card-body">
                <h5 class="card-title">Servicio 1</h5>
                <p class="card-text">Descripción del Servicio 1.</p>
                <a href="#" class="btn btn-primary buy-button">Comprar</a>
              </div>
            </div>
          </div>
      
          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{ asset('../img/servicio2.jpg') }}" class="card-img-top" alt="Servicio 2">
              <div class="card-body">
                <h5 class="card-title">Servicio 2</h5>
                <p class="card-text">Descripción del Servicio 2.</p>
                <a href="#" class="btn btn-primary buy-button">Comprar</a>
              </div>
            </div>
          </div>
      
          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="{{ asset('../img/servicio3.jpg') }}" class="card-img-top" alt="Servicio 3">
              <div class="card-body">
                <h5 class="card-title">Servicio 3</h5>
                <p class="card-text">Descripción del Servicio 3.</p>
                <a href="#" class="btn btn-primary buy-button">Comprar</a>
              </div>
            </div>
          </div>
      
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="{{ asset('../img/servicio4.jpg') }}" class="card-img-top" alt="Servicio 4">
              <div class="card-body">
                <h5 class="card-title">Servicio 4</h5>
                <p class="card-text">Descripción del Servicio 4.</p>
                <a href="#" class="btn btn-primary buy-button">Comprar</a>
              </div>
            </div>
          </div>
      
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="{{ asset('../img/servicio5.jpg') }}" class="card-img-top" alt="Servicio 5">
              <div class="card-body">
                <h5 class="card-title">Servicio 5</h5>
                <p class="card-text">Descripción del Servicio 5.</p>
                <a href="#" class="btn btn-primary buy-button">Comprar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
</div>

<script>
    $(document).ready(function() {
        $('.bodapacks').hide();
    });

    $('.comprarboda').on('click', function() {
        var packs = $('.packs');
        var packsboda = $('.bodapacks');
        packs.fadeOut(400);
        packsboda.fadeIn(800);
    });

</script>
@endsection
