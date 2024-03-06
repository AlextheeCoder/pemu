<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'tags',
        'content',
        'image',
        'status',
        'likes',
        'dislikes',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
        // Blog.php model

    public function comments()
    {
        return $this->hasMany(Comment::class); // Adjust Comment::class based on your actual Comment model
    }

    public function sluggable(): array{
    return [
        'slug' => [
            'source' => 'title' 
        ]
    ];
}

}
