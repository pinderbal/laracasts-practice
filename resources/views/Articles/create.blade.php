@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New Article</h1>

            <form action="/articles" method="post" >
                @csrf

               <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input 
                            type="text" 
                            class=" @error('title') danger @enderror" 
                            name="title" 
                            id="title"
                            value="{{ old('title') }}">

                        <!--{{ $errors->has('title') ? 'danger' : '' }}-->
                        <!-- Can also do: instead of above line-->
                        @error('title')
                            <p class="help danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div> 

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea 
                            class="textarea @error('excerpt') danger @enderror" 
                            name="excerpt" 
                            id="excerpt"
                            >{{ old('excerpt') }} </textarea>
                        @error('excerpt')
                            <p class="help danger">{{ $errors->first('excerpt') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea 
                            class="textarea @error('body') danger @enderror" 
                            name="body" 
                            id="body"
                            >{{ old('body') }}</textarea>
                        @error('body')
                            <p class="help danger"> {{ $errors->first('body') }}</p>
                        @enderror
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