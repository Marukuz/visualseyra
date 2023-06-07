@extends('plantillaAdmin')
@section('contenido')
    <div class="container-fluid mt-5">
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand">Galerias</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a class="hover:text-blue-600 nav-link" href="{{ route('galeria.create') }}" title="Admin">
                                Nueva Galeria
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            @foreach ($galerias as $galeria)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/' . $galeria->image) }}" class="card-img-top" alt="Foto 1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $galeria->nombre }}</h5>
                            <a href="{{ route('galeria.showimages', $galeria->id) }}" class="btn btn-primary">Ver fotos</a>
                            <a href="#" class="btn btn-secondary" data-toggle="modal"
                                data-target="#modal-{{ $galeria->id }}">Añadir Fotos</a>
                            <a data-galeria-id="{{ $galeria->id }}" class="btn btn-danger delete-galeria">Eliminar
                                Galeria</a>
                        </div>
                    </div>
                </div>
                <!-- MODAL SUBIR FOTO -->
                <div class="modal fade" id="modal-{{ $galeria->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-{{ $galeria->id }}-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-{{ $galeria->id }}-label">Subir Fotos - {{$galeria->nombre}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('galeria.storefoto', $galeria->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label class="mt-2">Imagen:</label>
                                    <input type="file" multiple class="form-control mt-2" name="image[]">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    </div>


    <!-- MODAL BORRADO -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Borrado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que quieres borrar la galeria seleccionada?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="delete-galeria-button">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.delete-galeria').click(function() {
                var galeriaId = $(this).data('galeria-id');
                $('#deleteModal').modal('show');
                $('#delete-galeria-button').click(function() {
                    $.ajax({
                        url: '/galeria/' + galeriaId,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            window.location.href = '{{ route('galeria.index') }}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
