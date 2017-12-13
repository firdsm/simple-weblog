@extends('layouts.master')

@section('content')

<h1 class="my-4">My Daily Blog
	<small>
		@if ( ! isset($keyword))
			All post 

			@if($month = request('month'))
				on {{ $month }}
			@endif

			@if($year = request('year'))
				{{ $year }}
			@endif

			@if(isset($tag))
				with tag {{ $tag }}
			@endif

			@if(isset($user))
				by {{ $user }}
			@endif
		@else		
		    <hr>	
			Result for {{ $keyword }}
		@endif

	</small>
</h1>

@foreach($posts as $post)

<div class="card mb-4">
	<img class="card-img-top" src="{{ asset('storage/'.$post->picture) }}" width="750" height="300" alt="Card image cap">
	<div class="card-body">
		<h2 class="card-title">{{ $post->title }}</h2>
		<p class="card-text">{{ str_limit($post->body, 100, '...') }}</p>		
		<a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>
	</div>
	<div class="card-footer text-muted">
		Posted on {{ $post->created_at->diffForHumans() }} by
		<a href="/post/user/{{$post->user->username}}"> {{ $post->user->name }} </a>
		@auth		
	        @if(Auth::id() == $post->user->id or Auth::user()->isAModerator())
		         <div style="float: right;">
			        <a href="/post/{{ $post->slug }}/edit" class="btn btn-sm btn-primary">Edit</a>
			        <form style="display: inline-block;" method="post"  action="/post/{{ $post->slug }}"> 
		                {{ method_field('delete') }}
		                {{ csrf_field() }}
		                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
	                </form>
		        </div>
		    @endif
		@endauth
		
	</div>
</div>

@endforeach

<ul class="pagination justify-content-center mb-4">

	<li class="page-item
	{{ ($posts->currentPage() == $posts->firstItem()) ? 'secondary disabled' : 'primary' }}" 
	href="{{ $posts->previousPageUrl() }}" >
		<a class="page-link" href="{{ $posts->previousPageUrl() }}">&rarr; Newer </a>
	</li>

    <li class="page-item 
    {{ ($posts->currentPage() == $posts->lastPage()) ? 'secondary disabled' : 'primary' }}" 
    href="{{ $posts->nextPageUrl() }}">
	    <a class="page-link" href="{{ $posts->nextPageUrl() }}">Older &larr;</a>
    </li>

</ul>

@endsection

