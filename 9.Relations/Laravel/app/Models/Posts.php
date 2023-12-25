<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperPosts
 */
class Posts extends Model
{
    use HasFactory;
    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class);
    }    
    
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
