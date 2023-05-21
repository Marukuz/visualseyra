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
    <div class="row justify-content-center mt-3">
        <div class="col-lg-7">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <h1 class="text-center mt-2">Crear Noticia</h1>
                <br>
                <div class="mb-12">
                    <label>Titulo de la noticia:
                        @error('title') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror    
                    </label><br>
                    <input style="width: 748px;" class="border rounded focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="title" value="{{ old('title') }}" placeholder="Escribe el titulo de la noticia">
                </div>
                <div class="mb-12">
                    <label>Contenido:
                        @error('body') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </label>
                    <textarea class="ckeditor border rounded focus:outline-none focus:shadow-outline p-2 mb-4" name="body"></textarea>
                </div>
                <div class="mb-12">
                    <input type="hidden" name="is_draft" value="0">
                    <input type="checkbox" name="is_draft" value="1"> Is draft?
                </div>
                <div class="mb-12 text-center">
                    <a class="btn btn-warning" href="{{ route('posts.index') }}">Cancelar</a>
                    <button class="btn btn-success" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection