@extends('plantillaAdmin')
@section('contenido')
<div class="container mt-5">
    <br><br><br><br><br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Noticias</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="hover:text-blue-600 nav-link" href="{{ route('posts.create') }}" title="Admin">
                            Nueva Noticia
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 text-center ">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <h1 class="text-center mt-2">Crear Noticia</h1>
                <br>
                <div class="mb-12">
                    <input class="w-full border rounded focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="title" value="{{ old('title') }}" placeholder="Escribe el titulo de la noticia" style="width: 500px;">
                </div>
                <div class="mb-12">
                    <textarea class="ckeditor border rounded focus:outline-none focus:shadow-outline p-2 mb-4" name="body" placeholder="Escribe el contenido aqui" required style="width: 500px;" cols="50" rows="10"></textarea>
                </div>
                <div class="mb-12">
                    <input type="hidden" name="is_draft" value="0">
                    <input type="checkbox" name="is_draft" value="1"> Is draft?
                </div>
            </form>
        </div>
    </div>
</div>


@endsection