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
                        <button class="delete-button delete-foto" data-foto-id="{{ $foto->id }}">
                            <i class='bx bx-x' style='color:#ff0000'></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="btn btn-secondary" href="{{ route('galeria.index') }}">Volver</a>
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
                 ¿Estás seguro que quieres borrar la foto seleccionada?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-danger" id="delete-foto-button">Eliminar</button>
             </div>
         </div>
     </div>
 </div>

 <script>
    $(function() {
        $('.delete-foto').click(function() {
            var fotoId = $(this).data('foto-id');
            $('#deleteModal').modal('show');
            $('#delete-foto-button').click(function() {
                $.ajax({
                    url: '/images/' + fotoId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    });
</script>
@endsection
