@extends('plantillaAdmin')
@section('contenido')
<div class="container-fluid mt-5">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
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
    <table class="table table-striped table-bordered table-hover" id="miTabla">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->nombre}}</td>
                <td>{{ $servicio->descripcion}}</td>
                <td class="text-center">
                    <a class="inline-block px-4 py-1 bg-blue-500 text-white rounded mr-2 hover:bg-blue-800 btn btn-warning" href="{{ route('servicio.edit', $servicio) }}" title="Edit">Modificar</a>
                    <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-service btn btn-danger" data-service-id="{{$servicio->id}}" title="Delete">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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