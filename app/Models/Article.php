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
}
