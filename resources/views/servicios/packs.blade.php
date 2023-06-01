@extends('plantilla')
@section('contenido')
<div class="container">
    <div class="container">
      @foreach($packs as $pack)
      <div class="col-md-12 mb-12">
        <div class="card mt-5 mb-5">
          <div class="row">
            <div class="col-md-4">
              <img src="{{ asset('img/'.$pack->image) }}" class="card-img"/>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title mt-2">{{$pack->nombre}}</h5>
                @php
                $contenido = trim($pack->contenido);
                $elementos = explode('-', $contenido);
                array_shift($elementos);
                @endphp
                <ul class="mt-4">
                  @foreach($elementos as $elemento)
                  <li>{{$elemento}}</li>
                  @endforeach
                </ul>
                <p>¿Quieres mas informacion? Siempre puedes pedir cita.</p>
                <a href="#" class="btn btn-secondary buy-button">Pedir Cita</a>
                <a href="#" class="btn btn-success buy-button">Comprar</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection