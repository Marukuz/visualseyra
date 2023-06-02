@extends('plantilla')
@section('contenido')
    <div class="container">
        <div class="container">
            @foreach ($packs as $pack)
                <div class="col-md-12 mb-12">
                    <div class="card mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('img/' . $pack->image) }}" class="card-img custom-img" />
                            </div>
                            <div class="col-md-7">
                              <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                <div style="flex-grow: 1;">
                                  <h5 class="card-title mt-2">{{ $pack->nombre }}</h5>
                                  @php
                                    $contenido = trim($pack->contenido);
                                    $elementos = explode('-', $contenido);
                                    array_shift($elementos);
                                  @endphp
                                  <ul class="mt-4">
                                    @foreach ($elementos as $elemento)
                                      <li>{{ $elemento }}</li>
                                    @endforeach
                                  </ul>
                                </div>
                                <div>
                                  <p>¿Quieres más información? Siempre puedes pedir cita.</p>
                                  <a href="#" class="btn btn-secondary buy-button">Pedir Cita</a>
                                  <a href="#" class="btn btn-success buy-button">Comprar</a>
                                </div>
                              </div> 
                            </div>
                          </div>  
                        </div>
                    </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection
