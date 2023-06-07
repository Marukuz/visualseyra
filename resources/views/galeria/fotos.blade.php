@extends('plantillaAdmin')
@section('contenido')
    <div class="container-fluid mt-5">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Galerias</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a class="hover:text-blue-600 nav-link" href="{{ route('servicio.create') }}" title="Admin">
                                Añadir Fotos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                @foreach($fotos as $foto)
                <div class="col-md-4 col-12 mb-4 mt-3">
                    <div class="image-container">
                        <img src="{{asset('img/'.$foto->image)}}" class="img-fluid" style="border: 1px solid black;">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
@endsection
