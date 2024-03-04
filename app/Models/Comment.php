<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'website', 'body', 'blog_id', 'parent_id']; 

    public function campaign(){
    return $this->belongsTo(Blog::class);
}

public function replies() {
    return $this->hasMany(Comment::class, 'parent_id');
}

public function parent() {
    return $this->belongsTo(Comment::class, 'parent_id');
}
}
