<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('posts/index', [
            'posts' => Post::where('is_draft', 0)->orderBy('created_at', 'desc')->get()->take(6)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->where('is_draft', false)->first();
        abort_unless($post, 404);
        return view('posts/post', [
            'post' => $post
        ]);
    }
}
