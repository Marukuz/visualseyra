@extends('plantillaAdmin')
@section('contenido')
    <div class="container mt-5">
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
        <h1>TEST</h1>
    </div>
@endsection
