@extends('plantillaAdmin')
@section('contenido')
    <div class="container-fluid mt-5">
        <br><br><br><br><br>
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
        <div class="row">
            @foreach($fotos as $foto)
            <div class="col-md-4 mb-4 mt-3">
                <img src="{{asset('img/'.$foto->image)}}" style="width: 100%; border: 1px black solid;">
            </div>
            @endforeach
        </div>
    </div>
@endsection
