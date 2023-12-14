<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct()
    {
        Inertia::share('categories', Categorie::all());
    }
    public function Home()
    {
        $latest_posts = Post::latest()->take(3)->with('Categorie')->get();
        return Inertia::render('landing/home/Index', [
            "posts" => $latest_posts,
        ]);
    }

    public function Post(Post $post)
    {
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $post->load('comments', 'categorie', 'user', 'tags', 'comments.user');
        return Inertia::render('landing/post/post', [
            "post" => $post,
            "next" => $next,
            "previous" => $previous
        ]);
    }

    public function PostsOfCategorie(Categorie $categorie)
    {
        $posts = Post::where('categorie_id', $categorie->id)
            ->with('categorie')
            ->get();
        return Inertia::render('landing/posts', [
            "posts" => $posts,
            "category" => $categorie
        ]);
    }

    public function AddComment(Request $request) {
        $this->validate($request,[
            "body" => "required|max:2000"
        ]);
        $comment = new \App\Models\Comment;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return back()->with([
            "success" => "Comment Added With Success"
        ]);
    }
}
