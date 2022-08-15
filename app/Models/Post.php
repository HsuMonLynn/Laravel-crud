<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
    
    //post and user relation
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * The categories that belong to the post.
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post','post_id','category_id',);
    }
}