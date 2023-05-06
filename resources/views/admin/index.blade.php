@extends('plantillaAdmin')
@section('contenido')
    <div class="container mt-5">
        <br><br><br><br><br>
        <h1>Usuarios</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefono}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
	function toggleSidebar() {
		var sidebar = document.getElementById("sidebar");
		var content = document.getElementById("content");
		sidebar.classList.toggle("active");
		content.classList.toggle("active");
	}
</script>
@endsection

