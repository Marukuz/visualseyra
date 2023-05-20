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
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">DNI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Teléfono</th>
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

<!-- MODAL CREAR USUARIO -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Crea un usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @error('dni')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <label class="mt-2">DNI:</label>
        <input type="text" name="dni" class="form-control mt-2">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <label class="mt-2">Nombre:</label>
        <input type="text" name="name" class="form-control mt-2">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <label class="mt-2">Correo:</label>
        <input type="email" name="email" class="form-control mt-2">
        @error('telefono')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <label class="mt-2">Telefono:</label>
        <input type="text" name="telefono" class="form-control mt-2">
        @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <label class="mt-2">Contraseña:</label>
        <input type="password" name="password" class="form-control mt-2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="create-user-button">Crear</button>
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

    $('.add-user').click(function() {
      $('#createUserModal').modal('show');
      $('#create-user-button').click(function() {
        var data = {
          dni: $('input[name=dni]').val(),
          name: $('input[name=name]').val(),
          email: $('input[name=email]').val(),
          telefono: $('input[name=telefono]').val(),
          password: $('input[name=password]').val()
        };
        $.ajax({
          url: '/perfil/',
          method: 'POST',
          data: {
            ...data,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            if (response.success) {
              location.reload();
            } else {
              // Eliminar mensajes de error anteriores
              $('.text-danger').remove();
              // Agregar nuevos mensajes de error
              $.each(response.errors, function(key, value) {
                var errorMessage = $('<span>').addClass('text-danger').text(value[0]);
                $('[name="' + key + '"]').after(errorMessage);
              });
            }
          }
        });
      });
    });
  });
</script>
@endsection