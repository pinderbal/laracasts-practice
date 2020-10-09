<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

//create restful template
//php artisan make:controller ProjectsController -r -m Project

class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id){
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        //https://laravel.com/docs/8.x/validation
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    public function edit($id){
        $article = Article::find($id);
        //find article associated with id
        return view('articles.edit', ['article' => $article]);
        //or u can do
        //return view('articles.edit', compact['article']);
    }

    public function update($id){
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }
}
