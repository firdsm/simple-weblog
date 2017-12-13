@extends('layouts.master')

@section('content')

	<div class="card my-4">
	    <h5 class="card-header">Edit Post</h5>
	    <div class="card-body">
	        <form method="post" action="/post/{{ $post->slug }}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}

			@include('layouts.error')

			  <div class="form-group">
			    <label for="title">Title</label>
			    <input name="title" value="{{ $post->title }}" type="text" class="form-control" id="title">	      
			  </div>

			  <div class="form-group">
			    <label for="body">Body</label>
			    <textarea rows="5" name="body" class="form-control" id="body">{{ $post->body }}</textarea>
			  </div>

			  <div class="form-group">
			    <label for="picture">Post Picture</label>
			    <img class="img-fluid rounded" src="{{ asset('storage/'.$post->picture) }}" width="75" height="25" alt="">
			    <input name="picture" value="{{ asset('storage/'.$post->picture) }}" type="file" class="form-control" id="picture">  
			  </div>

			  <div class="form-group">
			    <label for="body">Tags</label>
			    <select rows="5" name="tags[]" class="form-control" id="tags" multiple="multiple">	    
			    	@foreach($tags as $tag)
			    	    <option value="{{ $tag->id }}"
			    	    	@foreach($post->tags as $tg)
								@if($tag->id == $tg->id)
								    selected
								@endif
			    	    	@endforeach >
			    	    	{{ $tag->name }}
			    	    </option> 	
			    	@endforeach   	
			    </select>
			  </div>
			  
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary">Update</button>
			  </div>

			</form>
	    </div>
	</div>

@endsection

@section('script')
	<script>
		$('#tags').select2();
	</script>
@endsection