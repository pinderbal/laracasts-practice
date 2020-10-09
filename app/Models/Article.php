<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    // public function getRoutKeyName(){
    //     return 'slug';
    // }

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];

    public function path(){
        return route('articles.show', $this);
    }

    public function author(){
        //if a user has many articles, then an each belongsTo a user
        //laravel looks for conventional naming so search user_id.
        //To override add a second paramater in the belongsTo(User:class, user_id);
        //Change function name to author. 
        //Then you can do App\Article::find(1)->author; 
        //other wise it would be App\Article::find(1)->user; as default
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
