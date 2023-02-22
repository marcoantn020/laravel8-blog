<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags', 'post_id','tag_id');
    }

    public function listAndSearch()
    {
        $search = request()->input('search');
        return ($search) ?
            self::where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")
                ->with('author')
                ->paginate(5) :
            self::with('author')->paginate();
    }
}
