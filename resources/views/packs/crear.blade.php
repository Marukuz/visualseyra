@extends('plantillaAdmin')
@section('contenido')
<div class="container mt-5">
    <br><br><br><br><br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Packs</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="hover:text-blue-600 nav-link" href="{{ route('pack.create') }}" title="Admin">
                            Nuevo Pack
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-9">
            <form action="{{ route('pack.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="text-center mt-2">Crear Pack</h1>
                <br>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nombre del pack:
                            @error('nombre') 
                            <span class="text-danger">{{$message}}</span>
                            @enderror  
                        </label>
                        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Introduce un nombre.">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Servicio:
                            @error('servicio_id') 
                            <span class="text-danger">{{$message}}</span>
                            @enderror  
                        </label>
                        <select class="form-select" name="servicio_id">
                            @if (old('servicio_id'))
                            @php
                                $nombreServicio = DB::table('servicios')
                                    ->where('id', old('servicio_id'))
                                    ->value('nombre');  
                            @endphp
                            
                            <option selected value="{{old('servicio_id')}}">{{ $nombreServicio }}</option>
                            @else
                            <option selected disabled>Selecciona el servicio.</option>
                            @endif
                            
                            @foreach($servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Contenido:
                                @error('contenido') 
                                <span class="text-danger">{{$message}}</span>
                                @enderror      
                            </label><br>
                            <textarea class="border rounded focus:outline-none focus:shadow-outline p-2 mb-4" name="contenido" rows="5" cols="127" placeholder="Describe el contenido del pack.">{{old('contenido')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Imagen del Pack:
                                @error('image') 
                                <span class="text-danger">{{$message}}</span>
                                @enderror      
                            </label><br>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div><br>
                <div class="mb-12 text-center">
                    <a class="btn btn-warning" href="{{ route('pack.index') }}">Cancelar</a>
                    <button class="btn btn-success" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
