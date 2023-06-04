@extends('plantillaAdmin')
@section('contenido')
<div class="container-fluid mt-5">
    <br><br><br><br><br>
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
        @foreach($galerias as $galeria)
        <div class="col-md-6 mb-4">
          <div class="card">
            <img src="{{asset('img/'.$galeria->image)}}" class="card-img-top" alt="Foto 1">
            <div class="card-body">
              <h5 class="card-title">{{$galeria->nombre}}</h5>
              <a href="{{ route('galeria.show', $galeria->id) }}" class="btn btn-primary">Ver fotos</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
         
</div>
</div>

<!-- MODAL BORRADO -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar Borrado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estás seguro que quieres borrar el servicio seleccionado?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger" id="delete-service-button">Eliminar</button>
        </div>
      </div>
    </div>
</div>

<script>
    $(function() {
		$('.delete-service').click(function() {
			var serviceId = $(this).data('service-id');
			$('#deleteModal').modal('show');
			$('#delete-service-button').click(function() {
				$.ajax({
					url: '/servicio/' + serviceId,
					method: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					success: function() {
						window.location.href = '{{ route('servicio.listar') }}';
					}
				});
			});
		});
	});
</script>
@endsection