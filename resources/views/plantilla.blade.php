<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisualSeyra</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
</head>

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
                                <a class="nav-link dropdown-toggle" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Bienvenid@ {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item" href="{{ url('perfil') }}">Perfil</a></li>
                                    @if (Auth::user()->event)
                                        <li><a class="dropdown-item"
                                                href="{{ route('cita.show', Auth::user()->id) }}">Citas</a></li>
                                    @endif
                                    @if (Auth::user()->tipo == 'Administrador')
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('admin') }}">Admin</a></li>
                                    @endif
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="btn btn-danger" :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Salir') }}
                                        </a>
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
</body>

</html>
