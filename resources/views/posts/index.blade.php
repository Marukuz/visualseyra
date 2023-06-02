@extends('plantilla')
@section('contenido')
<section class="w-full bg-gray-200 flex-row justify-center text-center">
    <div class="container-fluid px-0">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item  active">
              <img class="d-block w-100" src="{{ asset('img/carrousel2.jpg') }}" alt="Videografía y Fotografía">
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
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  @foreach($posts->chunk(3) as $row)
                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                          <div class="row">
                              @foreach($row as $post)
                                  <div class="col-md-4 mb-4">
                                      <article class="text-left p-2 border border-gray-300">
                                          <h3 class="py-4 text-xl">{{$post->title}}</h3>
                                          <p>{!! html_entity_decode(htmlspecialchars($post->get_limit_body)) !!}</p><br>
                                          <a class="font-bold text-blue-600 no-underline hover:underline" href="{{ route('posts.detail', $post->slug) }}">Read more</a>
                                      </article>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
  </div>
</section>



@endsection