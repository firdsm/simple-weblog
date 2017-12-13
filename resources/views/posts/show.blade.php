@extends('layouts.master')

@section('content')

	<h1 class="mt-4">{{$post->title}}</h1>

	<p class="lead">
		by
		<a href="/post/user/{{$post->user->username}}">{{$post->user->name}}</a>
	</p>

	<hr>

	<p>{{$post->created_at->diffForHumans()}}</p>

	<hr>
	
	<img class="img-fluid rounded" src="{{ asset('storage/'.$post->picture) }}" width="900" height="300" alt="">

	<hr>

	<p>{{ $post->body }}</p>

	@if(count($post->tags))
		<ul>
			@foreach($post->tags as $tag)
			<li> <a href="/post/tag/{{ $tag->name }}"> {{ $tag->name }} </a></li>
			@endforeach
		</ul>
	@endif

	<hr>

	@guest
		<p style="text-align: center;">
			Please <a href="/login"> Login </a> to leave comment. 
			Don't have account? <a href="/register">Register here</a>
			<br>
			<br>
		</p>
	@endguest

	<div class="card my-4">
		<h5 class="card-header">Leave a Comment: </h5>
		<div class="card-body">
			<form method="post" action="/post/{{ $post->slug }}/comment">

				{{ csrf_field() }}

				<div class="form-group">
					@include('layouts.error')
				</div>

				<div class="form-group">
					<textarea name="body" class="form-control" rows="3"></textarea>
				</div>

				<button {{ ! auth()->check() ? 'disabled' : '' }} type="submit" class="btn btn-primary">Submit</button>
			
			</form>
		</div>
	</div>

	@foreach($post->comments as $comment)
		<div class="media mb-4">
			<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
			<div class="media-body">
				<h5 class="mt-0">{{ $comment->user->name }}</h5> 
				&nbsp <i> {{ $comment->created_at->diffForHumans() }} </i>
				{{ $comment->body }}
			</div>
		</div>
		<hr>
	@endforeach

	<br>
	<br>
	<br>

@endsection