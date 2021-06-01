<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    //
    protected $fillable = ['content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_posts(){
        return $this->belongsToMany(User::class, 'favorite_post' , 'favorite_post_id' , 'user_id')->withTimestamps();
    }
}
