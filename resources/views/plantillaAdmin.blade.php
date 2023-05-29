<!DOCTYPE html>
<html>
<head>
	<title>Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
	<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
            <a class="dropdown-toggler" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon" style="background-color: #333"></span>
            </a>   
			<a class="navbar-brand">Panel de Administración</a>
		</div>
	</nav>

	<div id="sidebar">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.index') }}">Gestion de Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('posts.index') }}">Gestion de Noticias</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('servicio.listar') }}">Gestion de Servicios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('pack.index') }}">Gestion de Packs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Configuración</a>
			</li>
		</ul>
        <a id="logout-btn" class="btn btn-danger" href="{{route('inicio.index')}}">Salir</a>
	</div>

@yield('contenido')
<script>
  function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content = document.getElementById("content");
    sidebar.classList.toggle("active");
    content.classList.toggle("active");
  }

  $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
	
</script>
@yield('script')
</body>
</html>