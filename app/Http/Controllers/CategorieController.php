<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::getData();
        return Inertia::render('Admin/Categorie/index', [
            'categories' => $categories,
            'filter' => $request->only(["search"])
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
    public function store(StoreCategorieRequest $request)
    {
        Categorie::create($request->all());
        return redirect()->route('admin.categorie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return Inertia::render('Admin/Categorie/Edit', [
            'categorie' => $categorie
        ]);
        // return response()->json(array('categorie' => $categorie));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());
        return redirect()->route('admin.categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.categorie.index');
    }
}
