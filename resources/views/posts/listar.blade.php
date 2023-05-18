@extends('plantillaAdmin')

@section('contenido')
<div class="container mt-5">
    <br><br><br><br><br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Noticias</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link add-user">Añadir Usuario</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Titulo</th>
                <th scope="col">Creacion</th>
                <th scope="col">Autor</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('j F, Y') }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    @if ($post->is_draft)
                    <div class="text-red-500">In draft</div>
                    @else
                    <div class="text-green-500">Published</div>
                    @endif
                </td>
                <td>
                    <a class="inline-block px-4 py-1 bg-blue-500 text-white rounded mr-2 hover:bg-blue-800" href="{{ route('posts.edit', $post) }}" title="Edit">Edit</a>

                    <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-post" href="{{ route('posts.destroy', $post) }}" title="Delete" data-id="{{$post->id}}">Delete</a>
                    <form id="posts.destroy-form-{{$post->id}}" action="{{ route('posts.destroy', $post) }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                        @method('DELETE')
                    </form>
                </td>
            <tr>
            @endforeach

        </tbody>
    </table>
    {{ $posts->links() }}

</div>
</div>
<script>
    var delete_post_action = document.getElementsByClassName("delete-post");

    var deleteAction = function(e) {
        event.preventDefault();
        var id = this.dataset.id;
        if (confirm('Are you sure?')) {
            document.getElementById('posts.destroy-form-' + id).submit();
        }
        return false;
    }

    for (var i = 0; i < delete_post_action.length; i++) {
        delete_post_action[i].addEventListener('click', deleteAction, false);
    }
</script>
@endsection