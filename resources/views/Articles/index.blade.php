@extends ('layout');

@section ('content')


<div id="wrapper">
	<div id="page" class="container">
	<!--forelse means if we have articles then iterate over them-->
    @forelse ($articles as $article)
		<div id="content">
			<div class="title">
				<h2><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{!! $article->excerpt !!}
        </div>
		<!-- If no articles found then. -->
		@empty
			<p>No relevant articles found.</p>
    @endforelse
	</div>
</div>


@endsection