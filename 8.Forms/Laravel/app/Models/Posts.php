<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPosts
 */
class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];
}
