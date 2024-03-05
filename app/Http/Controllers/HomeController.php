<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function AddComment(Request $request)
    {
        $this->validate($request, [
            "body" => 'required|min:10'
        ]);
        Comment::create([
            "body" => $request->body,
            "post_id" => $request->post_id,
            "user_id" => Auth::user()->id
        ]);
        return redirect()->back();
    }
    public function GetPostsOfCategorie($id)
    {
        $posts = Post::where('categorie_id', $id)->with(["user", "categorie", "comments"])->paginate(10);
        return Inertia::render('Landing/GetPosts/GetPosts' , [
            'posts'=> $posts
        ]);
    }
}
