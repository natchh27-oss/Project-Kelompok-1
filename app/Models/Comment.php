<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','comment','menu_id','media','parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

}
