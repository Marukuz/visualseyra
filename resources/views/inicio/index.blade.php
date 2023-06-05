@extends('plantilla')
@section('contenido')
    <!-- Imagen principal -->
    <div class="container-fluid px-0">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/carrousel1.jpg') }}" alt="Videografía y Fotografía">
                    <div class="carousel-caption d-md-block">
                        <h1 class="display-3 font-weight-bold text-light mb-3">Videografía y Fotografía</h1>
                        <p class="lead text-light mb-5">Capturamos tus mejores momentos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Imagen principal -->

    <!-- Servicios -->
    <div class="container my-5">
        <h2 class="text-center mb-5">Nuestros servicios</h2>
        <div class="row">
            @foreach ($servicios as $servicio)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 zoom-card">
                        <img class="card-img-top" src="{{ asset('img/' . $servicio->image) }}" alt="Servicio 3">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title font-weight-bold">{{ $servicio->nombre }}</h3>
                            <p class="card-text">{{ $servicio->descripcion }}</p>
                            <div class="mt-auto">
                                <a class="btn btn-primary" href="{{ route('servicio.index') }}">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /Servicios -->
    <!-- Galería -->
    <div class="container-fluid py-5">
        <h2 class="text-center mb-5">Nuestra galería</h2>
        <div class="row text-center">
            @foreach ($galerias as $galeria)
                <div class="col-md-6 mb-6">
                    <h3>{{ $galeria->nombre }}</h3>
                    @foreach ($galeria->imagenes as $index => $foto)
                        @if ($index === 0)
                            <div class="gallery-item">
                                <a href="{{ asset('img/' . $foto->image) }}"
                                    data-lightbox="galeria-{{ $galeria->id }}" data-title="Foto 1">
                                    <img class="img-fluid gallery-image" src="{{ asset('img/' . $foto->image) }}"
                                        alt="Foto 1">
                                </a>
                            </div>
                        @else
                            <a href="{{ asset('img/' . $foto->image) }}" data-lightbox="galeria-{{ $galeria->id }}"
                                data-title="Foto {{ $index + 1 }}" style="display: none;"></a>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <!-- Inicializar Lightbox -->
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
@endsection
