<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'categorie_id',
    ];

    protected $appends = [
        'categorie_name',
        'categorie_slug',
        'full_image',
        'user_full_name',
    ];

    protected $hidden = [
        'categorie',
        'categorie_id',
        'user_id',
        "created_at",
        "updated_at"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class );
    }
    public function getFullImageAttribute()
    {
        return $this->Image ?  asset("images/posts/" . $this->Image->url) : null;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getCategorieNameAttribute(): string
    {
        return $this->categorie->name;
    }
    public function getCategorieSlugAttribute(): string
    {
        return $this->categorie->slug;
    }
    public function getUserFullNameAttribute(): string
    {
        return $this->user->name;
    }
    
    public function Image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
