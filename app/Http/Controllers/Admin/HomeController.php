<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function Home()
    {
        return Inertia::render('Admin/home/index', [
            // 'data' => User::paginate(10),
        ]);
    }
}
