@extends('plantillaAdmin')
@section('contenido')
    <div class="container-fluid mt-5">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Usuarios</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link add-user">Añadir Usuario</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container my-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <h1 class="text-center mt-2">Crear Usuario</h1>
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI:
                                    @error('dni')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control " id="dni" name="dni"
                                    value="{{ old('dni') }}" placeholder="Introduce un DNI.">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre: @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control " id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Introduce un nombre.">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo: @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="email" class="form-control " id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Introduce un correo.">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono: @error('telefono')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="tel" class="form-control " id="telefono" name="telefono"
                                    value="{{ old('telefono')}}" placeholder="Introduce un numero de telefono.">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo:
                                    @error('tipo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-select " name="tipo">
                                    @if (old('tipo') == 'Administrador')
                                    <option selected>Administrador</option>    
                                    <option>Usuario</option>
                                    @elseif (old('tipo') == 'Usuario')                                    
                                    <option selected>Usuario</option>
                                    <option>Administrador</option>    
                                    @else
                                    <option selected>Usuario</option>
                                    <option>Administrador</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-12 text-center">
                                <a type="button" class="btn btn-secondary" href="{{ route('admin.index') }}">Cancelar</a>
                                <button type="submit" class="btn btn-success">Crear</button>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
