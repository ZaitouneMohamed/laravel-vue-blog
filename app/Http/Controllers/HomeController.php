<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function AddComment(Request $request)
    {
        $this->validate($request,[
            "body" => 'required|min:10'
        ]);
        Comment::create([
            "body" => $request->body,
            "post_id" => $request->post_id,
            "user_id" => Auth::user()->id
        ]);
        return redirect()->back();
    }
}
