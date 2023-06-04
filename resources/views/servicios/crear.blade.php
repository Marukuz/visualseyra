@extends('plantillaAdmin')
@section('contenido')
    <div class="container mt-5">
        <br><br><br><br><br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Servicios</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a class="hover:text-blue-600 nav-link" href="{{ route('servicio.create') }}" title="Admin">
                                Nuevo Servicio
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-7">
                <form action="{{ route('servicio.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center mt-2">Crear Servicio</h1>
                    <br>
                    <div class="mb-12">
                        <label>Nombre del servicio
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label><br>
                        <input style="width: 748px;" class="border rounded focus:outline-none focus:shadow-outline p-2 mb-4"
                            type="text" name="nombre" value="{{ old('nombre') }}"
                            placeholder="Escribe el nombre del servicio">
                    </div>
                    <div class="mb-12">
                        <div class="form-group">
                            <label>Imagen del Servicio:
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label><br>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
            </div><br>
            <div class="mb-12 text-center mt-3">
                <a class="btn btn-warning" href="{{ route('servicio.listar') }}">Cancelar</a>
                <button class="btn btn-success" type="submit">Crear</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
