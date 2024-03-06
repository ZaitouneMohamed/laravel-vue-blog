<?php

namespace App\Http\Middleware;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'message' => fn () => $request->session()->get('message'),
                'success' => fn () => $request->session()->get('success'),
            ],
            'topUsers' => User::withCount('posts')->orderByDesc('posts_count')->limit(5)->get(),
            'categories' => Categorie::take(10)->get(),
            'allCategories' => Categorie::all('name' , 'id')
        ];
    }
}
