@extends('plantilla')
@section('contenido')
<section class="w-full bg-gray-200 py-4 flex-row justify-center text-center">
    <div class="flex justify-center">
        <div class="max-w-4xl">
            <h1 class="px-4 text-6xl break-words">{{$post->title}}</h1>
        </div>
    </div>
</section>
<article class="w-full py-8">
    <div class="flex justify-center ">
        <div class="container">
            <div class="max-w-4xl text-justify">
                <img src="{{asset('img/'.$post->image)}}" style="width: 100%" class="mb-3">
                {!! html_entity_decode(htmlspecialchars($post->body)) !!}
            </div>
        </div>
    </div>
</article>
<br><br><br>
<section class="w-full py-8">
    <div class="max-w-4xl flex-row justify-start p-3 text-left ml-auto mr-auto border rounded shadow-sm bg-gray-50">

        <div class="container">
            <h3 class="py-4 text-2xl">Comentarios</h3>
            @guest
            <p>Tienes que estar logueado para poder comentar</p>
            @else
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <textarea class="w-full h-28 resize-none border rounded focus:outline-none focus:shadow-outline p-2 form-control" name="comment" placeholder="Escribe aqui un comentario" required cols="50">{{ old('comment') }}</textarea><br>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="">
                    <input type="submit" value="Enviar" class="btn btn-success mb-3 form-control">
                </div>
                @if (session('status'))
                    <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                        {{ session('status') }}
                    </div>
                @endif
                @if($errors->any())
                <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                    {{$errors->first()}}
                </div>
                @endif
            </form>
            @endguest
            @foreach($post->comments as $comment)
            <div class="w-full bg-white p-2 my-2 border">
                <div class="header flex justify-between mb-4 text-sm text-gray-500">
                    <div>
                        <strong>Por {{$comment->user->name}}</strong>
                    </div>
                </div>
                <div class="text-lg">{{$comment->comment}}</div>
                <div class="d-flex justify-content-end text-secondary">
                    {{$comment->created_at->format('j F, Y')}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection