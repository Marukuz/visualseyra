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
                            Nuevo pack
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Servicio</th>
                <th scope="col">Nombre</th>
                <th scope="col">Contenido</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packs as $pack)
            <tr>
                <td>{{ $pack->id }}</td>
                <td>{{ $pack->servicio->nombre }}</td>
                <td>{{ $pack->nombre}}</td>
                <td>{{ $pack->contenido}}</td>
                <td>{{ $pack->precio}}€</td>

                <td class="text-center">
                    <a class="inline-block px-4 py-1 bg-blue-500 text-white rounded mr-2 hover:bg-blue-800 btn btn-warning" href="{{ route('pack.edit', $pack) }}" title="Edit">Editar</a>

                    <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-service btn btn-danger" data-service-id="{{$pack->id}}" title="Delete">Eliminar</a>
                </td>
            <tr>
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
          ¿Estás seguro que quieres borrar el pack seleccionado?
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
					url: '/pack/' + serviceId,
					method: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					success: function() {
						window.location.href = '{{ route('pack.index') }}';
					}
				});
			});
		});
	});
</script>
@endsection
