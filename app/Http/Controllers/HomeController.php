<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
    public function GetPostsOfCategorie(Categorie $categorie)
    {
        $posts = $categorie->posts()->paginate(10);
        $posts->load(["user", "categorie", "comments"]);
        return Inertia::render('Landing/GetPosts/GetPosts', [
            'posts' => $posts
        ]);
    }
}
