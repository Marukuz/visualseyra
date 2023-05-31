@extends('plantilla')
@section('contenido')
<section class="w-full bg-gray-200 flex-row justify-center text-center">
    <div class="container-fluid px-0">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('img/carrousel1.jpg') }}" alt="Videografía y Fotografía">
              <div class="carousel-caption d-md-block">
                <h1 class="display-3 font-weight-bold text-light mb-3">Ultimas Noticias</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('img/carrousel2.jpg') }}" alt="Videografía y Fotografía">
              <div class="carousel-caption d-md-block">
                <h1 class="display-3 font-weight-bold text-light mb-3">Ultimas Noticias</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('img/carrousel3.jpg') }}" alt="Videografía y Fotografía">
              <div class="carousel-caption d-md-block">
                <h1 class="display-3 font-weight-bold text-light mb-3">Ultimas Noticias</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<section class="w-full">
    <div class="container mt-5">
        <div class="row">
            @foreach($posts->chunk(3) as $row)
                @foreach($row as $post)
                    <div class="col-md-4 mb-4">
                        <article class="text-left p-2 border border-gray-300">
                            <h3 class="py-4 text-xl">{{$post->title}}</h3>
                            <p>{!! html_entity_decode(htmlspecialchars($post->get_limit_body)) !!}</p><br>
                            <a class="font-bold text-blue-600 no-underline hover:underline" href="{{ route('posts.detail', $post->slug) }}">Read more</a>
                        </article>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>


@endsection