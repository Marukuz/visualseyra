<!DOCTYPE html>
<html>
<head>
	<title>Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
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
				<a class="nav-link" href="#">Configuración</a>
			</li>
		</ul>
        <button id="logout-btn" class="btn btn-danger">Cerrar Sesión</button>
	</div>

@yield('contenido')

@yield('script')
</body>
</html>