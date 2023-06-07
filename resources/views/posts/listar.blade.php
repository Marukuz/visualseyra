@extends('plantillaAdmin')

@section('contenido')
<div class="container-fluid mt-5">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand">Noticias</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="hover:text-blue-600 nav-link" href="{{ route('posts.create') }}" title="Admin">
                            Nueva Noticia
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
                <th scope="col">Titulo</th>
                <th scope="col">Creacion</th>
                <th scope="col">Autor</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('j F, Y') }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    @if ($post->is_draft)
                    <div class="text-red-500">Borrador</div>
                    @else
                    <div class="text-green-500">Publicado</div>
                    @endif
                </td>
                <td class="text-center">
                    <a class="inline-block px-4 py-1 bg-blue-500 text-white rounded mr-2 hover:bg-blue-800 btn btn-warning" href="{{ route('posts.edit', $post) }}" title="Edit">Editar</a>
                    <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-post btn btn-danger" title="Delete" data-post-id="{{$post->id}}">Eliminar</a>
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
          ¿Estás seguro que quieres borrar la noticia seleccionada?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger" id="delete-post-button">Eliminar</button>
        </div>
      </div>
    </div>
</div>

<script>
    $(function() {
		$('.delete-post').click(function() {
			var postId = $(this).data('post-id');
			$('#deleteModal').modal('show');
			$('#delete-post-button').click(function() {
				$.ajax({
					url: '/posts/' + postId,
					method: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					success: function() {
						window.location.href = '{{ route('posts.index') }}';
					}
				});
			});
		});
	});
</script>
@endsection