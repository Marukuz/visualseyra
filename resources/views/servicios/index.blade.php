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
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('img/bodas.jpg') }}" class="card-img-top" alt="Servicio 1">
        <div class="card-body">
          <h5 class="card-title">Bodas</h5>
          <p class="card-text">¡Celebra el amor con nuestro servicio de bodas excepcional! En Visualseyra, entendemos que tu boda es uno de los momentos más especiales de tu vida, por eso nos dedicamos a hacer de cada detalle un recuerdo inolvidable.</p>
          <br>
          <a href="#" class="btn btn-primary comprarboda">Ver Packs</a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('img/comuniones.jpg') }}" class="card-img-top" alt="Servicio 2">
        <div class="card-body">
          <h5 class="card-title">Comuniones</h5>
          <p class="card-text">
            ¡Celebra un día especial con nuestro servicio de comuniones inolvidables! En Visualseyra, comprendemos que la Primera Comunión de tu hijo/a es un momento único y significativo en su vida, por eso nos dedicamos a hacer de cada detalle una experiencia memorable
          </p>          
          <a href="#" class="btn btn-primary">Ver Packs</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PACKS BODAS -->
<div class="container bodapacks">
  <div class="container">
    @foreach($packsb as $packb)
    <div class="col-md-12 mb-12">
      <div class="card mt-5 mb-5">
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('img/bodas.jpg') }}" class="card-img" alt="Servicio 1">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title mt-2">{{$packb->nombre}}</h5>
              @php
              $contenido = trim($packb->contenido);
              $elementos = explode('-', $contenido);
              array_shift($elementos);
              @endphp
              <ul class="mt-4">
                @foreach($elementos as $elemento)
                <li>{{$elemento}}</li>
                @endforeach
              </ul>
              <p>¿Quieres mas informacion? Siempre puedes pedir cita.</p>
              <a href="#" class="btn btn-secondary buy-button" data-toggle="modal" data-target="#myModal">Pedir Cita</a>
              <a href="#" class="btn btn-success buy-button" data-toggle="modal" data-target="#myModal">Comprar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL PACK -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">{{$packb->nombre}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <!-- Contenido del modal -->
            <img src="{{ asset('img/bodas.jpg') }}" style="height:200px; width:300px;">
            <p>Aquí puedes agregar todo el contenido que desees para tu modal grande.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>

    <!-- FINAL MODAL PACK -->
    @endforeach
  </div>
</div>
</div>
<!-- FIN PACKS BODAS -->


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