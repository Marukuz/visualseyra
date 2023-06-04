@extends('plantillaAdmin')
@section('contenido')
<div class="container-fluid mt-5">
  <br><br><br><br><br>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <a class="navbar-brand">Usuarios</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link add-user" href="{{route('user.create')}}">Añadir Usuario</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <table class="table table-striped table-bordered table-hover" id="miTabla">
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">DNI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Tipo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr class="text-center">
        <td>{{$user->id}}</td>
        <td>{{$user->dni}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->telefono}}</td>
        <td>{{$user->tipo}}</td>
        <td>
          <a class="btn btn-warning" href="{{ route('user.edit',$user) }}" >Modificar</a>
          <button class="btn btn-danger delete-user" data-id="{{$user->id}}">Eliminar</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
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
        ¿Estás seguro que quieres borrar este usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" id="delete-user-button">Eliminar</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script>
  $(function() {
    $('.delete-user').click(function() {
      var userId = $(this).data('id');
      $('#deleteModal').modal('show');
      $('#delete-user-button').click(function() {
        $.ajax({
          url: '/perfil/' + userId,
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