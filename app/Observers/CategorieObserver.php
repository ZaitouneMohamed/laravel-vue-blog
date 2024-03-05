<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\Categorie;

class CategorieObserver
{
    /**
     * Handle the Categorie "created" event.
     */
    public function created(Categorie $categorie): void
    {
        //
    }

    public function creating(Categorie $categorie): void
    {
        $categorie->slug = Str::slug($categorie->name);
    }

    /**
     * Handle the Categorie "updated" event.
     */
    public function updated(Categorie $categorie): void
    {
        //
    }

    /**
     * Handle the Categorie "deleted" event.
     */
    public function deleted(Categorie $categorie): void
    {
        //
    }

    /**
     * Handle the Categorie "restored" event.
     */
    public function restored(Categorie $categorie): void
    {
        //
    }

    /**
     * Handle the Categorie "force deleted" event.
     */
    public function forceDeleted(Categorie $categorie): void
    {
        //
    }
}
