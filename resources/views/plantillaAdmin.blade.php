<!DOCTYPE html>
<html>

<head>
	<title>Panel de Administración</title>
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
	<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/agenda.js') }}"></script>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
	<style>
		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
		}

		.wrapper {
			display: flex;
			min-height: 100vh;
		}

		#sidebar {
			width: 250px;
			background-color: #333;
			color: #fff;
			padding-top: 60px;
			z-index: 100;
			position: fixed;
			top: 0;
			bottom: 0;
		}

		#content {
			flex: 1;
			padding: 20px;
			margin-left: 200px;
		}

		body {
			display: flex;
			flex-direction: column;
			margin: 0;
		}

		.wrapper {
			flex: 1;
			display: flex;
		}

		#sidebar {
			flex-shrink: 0;
			overflow-y: auto;
			/* Agregamos overflow-y para habilitar desplazamiento en el sidebar si es necesario */
		}

		#content {
			flex-grow: 1;
			display: flex;
			/* Agregamos display flex para ocupar el espacio verticalmente */
			flex-direction: column;
			/* Aseguramos que el contenido se distribuya verticalmente */
		}
	</style>
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

	<div class="wrapper">
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
					<a class="nav-link" href="{{ route('agenda.index') }}">Gestion de Citas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Configuración</a>
				</li>
			</ul>
			<a id="logout-btn" class="btn btn-danger" href="{{route('inicio.index')}}">Salir</a>
		</div>
		<div id="content">
			@yield('contenido')
		</div>
	</div>


	<script>
		function toggleSidebar() {
			var sidebar = document.getElementById("sidebar");
			var content = document.getElementById("content");
			sidebar.classList.toggle("active");
			content.classList.toggle("active");
		}

		$(document).ready(function() {
			$('.ckeditor').ckeditor();
		});
	</script>
	@yield('script')
</body>

</html>