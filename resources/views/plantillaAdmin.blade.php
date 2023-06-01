<!DOCTYPE html>
<html>
<head>
	<title>Panel de Administración</title>
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'
    rel='stylesheet'>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
	<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/agenda.js') }}"></script>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
	<div class="sidebar close">
		<div class="logo-details">
		  <i class='bx' style='color:#080808'><img src="{{asset('img/favicon.png')}}" style="width: 24px;"></i>
		  <span class="logo_name"style='color:#080808'>VisualSeyra</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="{{ route('admin.index') }}">
					<i class='bx bx-group' ></i>
					<span class="link_name">Usuarios</span>
				</a>
				<ul class="sub-menu blank">
				  <li><a class="link_name" href="{{ route('admin.index') }}">Usuarios</a></li>
				</ul>
			  </li>
			  <li>
				<div class="iocn-link">
				  <a href="{{ route('posts.index') }}">
					<i class='bx bx-news' ></i>
					<span class="link_name">Noticias</span>
				  </a>
				</div>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="{{ route('posts.index') }}">Noticias</a></li>
				</ul>
			  </li>
			  <li>
				<div class="iocn-link">
				  <a href="{{ route('servicio.listar') }}">
					<i class='bx bx-store' ></i>
					<span class="link_name">Servicios</span>
				  </a>
				</div>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="{{ route('servicio.listar') }}">Servicios</a></li>
				</ul>
			  </li>
			  <li>
				<div class="iocn-link">
				  <a href="{{ route('pack.index') }}">
					<i class='bx bx-package' ></i>
					<span class="link_name">Packs</span>
				  </a>
				</div>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="{{ route('pack.index') }}">Packs</a></li>
				</ul>
			  </li>
			  <li>
				<div class="iocn-link">
				  <a href="{{ route('agenda.index') }}">
					<i class='bx bxs-calendar' ></i>
					<span class="link_name">Calendario</span>
				  </a>
				</div>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="{{ route('agenda.index') }}">Calendario</a></li>
				</ul>
			  </li>
			  <li>
				<div class="profile-details">
				  <div class="profile-content">
					<img src="{{asset('img/profile.png')}}" alt="profileImg">
				  </div>
				  <div class="name-job">
					<div class="profile_name" style="{{ strlen(Auth::user()->name) > 10 ? 'font-size: 14px;' : '' }}">{{ Auth::user()->name }}</div>
					<div class="job">{{ Auth::user()->tipo }}</div>
				  </div>
					<a href="{{route('inicio.index')}}">
						<i class='bx bx-log-out' style="color:white"></i>
					</a>
				</div>
			  </li>
			</ul>
	</div>
	<section class="home-section">
		<div class="home-content">
		  	<nav class="navbar navbar-dark bg-dark fixed-top navbar-primary navbar-resize">
				<div class="container-fluid">
				<a class="dropdown-toggler" onclick="toggleSidebar()">
					<i class='bx bx-menu' ></i>
				</a>
				<a class="navbar-brand">Panel de Administración</a>
				</div>
			</nav>
		</div>
		@yield('contenido')
	</section>

	<script>
		let arrow = document.querySelectorAll(".arrow");
		for (var i = 0; i < arrow.length; i++) {
			arrow[i].addEventListener("click", (e)=>{
				let arrowParent = e.target.parentElement.parentElement;
				arrowParent.classList.toggle("showMenu");
			});
		}

		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".bx-menu");

		sidebarBtn.addEventListener("click", ()=>{
			sidebar.classList.toggle("close");
			let navbar = document.querySelector(".navbar-resize");
			navbar.classList.toggle("sidebar-open");
		});

		$(document).ready(function() {
			$('.ckeditor').ckeditor();
		});
	</script>
	@yield('script')
</body>
</html>
