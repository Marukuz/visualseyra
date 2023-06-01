@extends('plantillaAdmin')
@section('contenido')
    <div class="container mt-5">
        <br><br><br><br><br>
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
                        <form action="{{ route('user.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h1 class="text-center mt-2">Modificar Usuario</h1>
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI:
                                    @error('dni')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control form-control-lg" id="dni" name="dni"
                                    value="{{ old('dni', $user['dni']) }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre: @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    value="{{ old('name', $user['name']) }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo: @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    value="{{ old('email', $user['email']) }}">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono: @error('telefono')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="tel" class="form-control form-control-lg" id="telefono" name="telefono"
                                    value="{{ old('telefono', $user['telefono']) }}">
                            </div>
                            <div class="mb-3">
                                <label>Tipo:
                                    @error('tipo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-select form-control-lg" name="tipo">
                                    @if ($user['tipo'] == 'Administrador')
                                        <option selected>Administrador</option>
                                        <option>Usuario</option>
                                    @else
                                        <option selected>Usuario</option>
                                        <option>Administrador</option>
                                    @endif

                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                                <a type="button" class="btn btn-secondary btn-lg"
                                    href="{{ route('admin.index') }}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
