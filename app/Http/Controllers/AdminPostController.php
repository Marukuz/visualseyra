<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Intervention\Image\Facades\Image;
use App\Http\Middleware\Admin;

class AdminPostController extends Controller
{

    public function __construct()
    {
        $this->middleware(Admin::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts/listar', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $datos = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'is_draft' => 'required',
            'image' => 'required'
        ]);

        $image = $request->file('image');

        $nombreArchivo = 'post_' . $datos['title'] . '_' . time() . '.' . $image->getClientOriginalExtension();

        $compressedImage = Image::make($image)
            ->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);

        $compressedImage->save(public_path('img/' . $nombreArchivo));
        
        $datos['image'] = $nombreArchivo;

        $user = Auth::user();
        $post = new Post;
        $post->title = $datos['title'];
        $post->body = $datos['body'];
        $post->is_draft = $datos['is_draft'];
        $post->image = $datos['image'];
        $post->user()->associate($user);
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/modificar', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $datos = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $datos['title'];
        $post->body = $datos['body'];
        $post->is_draft = $request->input('is_draft');

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::where('post_id', $id)->get();
        $post = Post::find($id);
        foreach ($comments as $comment) {
            $comment->delete();
        }
        $post->delete();
    }
}
