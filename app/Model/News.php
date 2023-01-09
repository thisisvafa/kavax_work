<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'slug', 'status', 'author_id', 'content_text', 'thumbnail', 'post_meta'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'author_id');
    }
}
