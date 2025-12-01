<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 protected $fillable = ['name','description','price','image','category_id','is_signature'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

}
