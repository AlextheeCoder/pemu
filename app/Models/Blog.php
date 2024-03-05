<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
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

}
