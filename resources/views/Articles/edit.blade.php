@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New Article</h1>

            <form action="/articles/{{ $article->id }}" method="post" >
                <!-- always include csrf token in form, except it get request-->
                @csrf
                <!-- The below line must be added when trying to update. line 8 keep as post, line 11 add put-->
                <!-- must be used for put, patch and delete requests-->
                @method('PUT')

               <div class="field">
                    <label class="label" for="title">Update Article</label>

                    <div class="control">
                        <input type="text" class="input" name="title" id="title" value="{{ $article->title }}">
                    </div>
                </div> 

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt">{{ $article->excerpt }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body">{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection