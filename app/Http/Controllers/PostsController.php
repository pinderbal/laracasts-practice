<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;

class PostsController extends Controller
{
    public function show($slug){
        // $posts = [
        //     'my-first-post' => 'Hello, this is my first blog post!',
        //     'my-second-post' => 'Now I am getting the hang of this blogging thing.'
        // ];
        $post = POST::where('slug', $slug)->firstorFail();

        //      \DB backslash means global variable (if not use DB at top)
        // $post = DB::table('posts')->where('slug',$slug)->first();
        
        return view('post', [
            'post' => $post
        ]);
    }
}
