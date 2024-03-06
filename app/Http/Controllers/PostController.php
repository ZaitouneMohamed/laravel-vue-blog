<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Services\ImagesServices;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $imagesservices;

    public function __construct(ImagesServices $ImagesServices)
    {
        $this->imagesservices = $ImagesServices;
    }
    public function index()
    {
        $posts = Post::with(['user', 'categorie', 'Image'])->latest()->paginate(5);
        return Inertia::render('Admin/Posts/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'categorie_id' => $request->categorie_id,
        ]);
        if ($request->has('image')) {
            $image = $this->imagesservices->uploadImage($request->image, "posts");
            $new_image = new Image(["url" => $image]);
            $post->Image()->save($new_image);
        }
        return redirect()->route('admin.post.index')->with('success', 'post created with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user', 'comments', 'comments.user', 'categorie');
        return Inertia::render('Landing/post/post', [
            // 'route' => Route::getCurrentRoute()->uri(),
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('admin.post.index')->with('success', 'post updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'post deleted with success');
    }
}
