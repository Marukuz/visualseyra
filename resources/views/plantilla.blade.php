<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisualSeyra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>    
    <script src="{{ asset('js/moment.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    @yield('css')
</head>
<style>
    .custom-img {
        max-width: 100%;
        height: auto;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    footer {
        background-color: #f9f9f9;
        padding: 20px;
        margin-top: auto;
        /* Mueve el footer hacia abajo */
    }

    /* Cambiar el color de las flechas del carrusel */
    .carousel-control-prev {
        left: -150px;
        /* Ajustar el margen izquierdo */
    }

    .carousel-control-next {
        right: -150px;
        /* Ajustar el margen derecho */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(100%);
        /* Invertir el color de las flechas */
        opacity: 1;
        /* Ajustar la opacidad si es necesario */
    }
</style>

</style>
@yield('styles')

<body>
    <header>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('inicio.index') }}"><img
                        src="https://visualseyra.com/wp-content/uploads/2017/03/logo-mobile-2.png" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('inicio.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.home') }}">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicio.index') }}">Servicios</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (!Auth::user())
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('login') }}">Log-in</a>
                            </li>
                        @else
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Bienvenid@ {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item" href="{{ url('perfil') }}">Perfil</a></li>
                                    <li><a class="dropdown-item" href="{{ url('perfil') }}">Citas</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @if (Auth::user()->tipo == 'Administrador')
                                        <li><a class="dropdown-item" href="{{ url('admin') }}">Admin</a></li>
                                    @endif
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-danger mx-auto">
                                            <x-responsive-nav-link class="text-decoration-none text-white"
                                                :href="route('logout')"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </button>
                                    </form>
                                </ul>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('contenido')
    <footer class="bg-light py-3">
        <div class="container text-center">
            <p>© 2023 Todos los derechos reservados. VisualSeyra</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
