<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

//create restful template
//php artisan make:controller ProjectsController -r -m Project

class ArticlesController extends Controller
{
    public function index(){

        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
        
        return view('articles.index', ['articles' => $articles]);
    }
    /*
    * If you put Article $article in the parameter larvel does the search my id query automatically.
    * If you want to change the search by, you will have to make a public function getRoutKeyName(){
    * in the Article model and return 'column name'.
    */ 
    public function show(Article $article){
        // $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create(){
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(){
        //https://laravel.com/docs/8.x/validation
        // $validatedAtrributes = request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        /* 
        *  $article = new Article();
        *  $article->title = request('title');
        *  $article->excerpt = request('excerpt');
        *  $article->body = request('body');
        *  $article->save();
        *  Cleaner way of doing the above lines
        *  when using create you have to add 'protected $fillable = ['title', 'excerpt', 'body'];' to the model
        *  or protected $guarded = [];
        */
        // Article::create($this->validateArticle());
        
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));

        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    public function edit(Article $article){
        // $article = Article::find($id);
        //find article associated with id
        return view('articles.edit', ['article' => $article]);
        //or u can do
        //return view('articles.edit', compact['article']);
    }

    public function update(Article $article){
        // $validatedAtrributes = request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article = Article::find($id);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        // $article->save();
        // Below is cleaner way of doing this.

        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id' //runs quick query to tags table to see if tag exists
        ]);
    }
}
