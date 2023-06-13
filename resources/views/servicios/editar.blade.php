@extends('plantillaAdmin')
@section('contenido')
<div class="container-fluid mt-5">
    <br>
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
            <form action="{{ route('servicio.update',$servicio) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT');
                <h1 class="text-center mt-2">Editar Servicio</h1>
                <br>
                <div class="mb-12">
                    <label>Nombre del servicio
                        @error('nombre') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror    
                    </label><br>
                    <input class="form-control" type="text" name="nombre" value="{{ old('nombre',$servicio->nombre) }}" placeholder="Escribe el nombre del servicio">
                </div><br>
                <div class="mb-12">
                    <label>Descripcion
                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label><br>
                    <textarea class="form-control"
                        type="text" name="descripcion"
                        placeholder="Escribe la descripcion del servicio">{{ old('descripcion',$servicio->descripcion) }}</textarea>
                </div><br>
                <div class="mb-12">
                    <div class="form-group">
                        <label>Imagen del Servicio:
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label><br>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div><br>
                <div class="mb-12 text-center">
                    <a class="btn btn-secondary" href="{{ route('servicio.listar') }}">Cancelar</a>
                    <button class="btn btn-warning" type="submit">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
