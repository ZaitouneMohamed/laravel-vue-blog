<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    static public function getData()
    {
        $data = self::select("categories.*");
        if (Request()->get('search')) {
            $data = $data->where('name', 'like', '%' . Request()->get('search') . '%');
        }
        $data = $data->withCount('posts'); // Assigning back to $data
        return $data->latest()->paginate(5)->appends(Request::except('page')); // Maintain search state in pagination links
    }
}
