@extends('layouts.master')

@section('content')
	
	<div class="card my-4">
	    <h5 class="card-header">Create New Post</h5>
	    <div class="card-body">
	        <form method="post" action="/post" enctype="multipart/form-data">

			{{ csrf_field() }}

			@include('layouts.error')

			  <div class="form-group">
			    <label for="title">Title</label>
			    <input name="title" value="{{ old('title')}}" type="text" class="form-control" id="title">  
			  </div>

			  <div class="form-group">
			    <label for="body">Body</label>
			    <textarea rows="5" name="body" class="form-control" id="body">{{ old('body')}}</textarea>
			  </div>

			  <div class="form-group">
			    <label for="picture">Post Picture</label>
			    <input name="picture" value="{{ old('picture')}}" type="file" class="form-control" id="picture">  
			  </div>

			  <div class="form-group">
			    <label for="body">Tags</label>
			    <select rows="5" name="tags[]" class="form-control" id="tags" multiple="multiple">
			    	@foreach($tags as $tag)
			    		<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			    	@endforeach	    	
			    </select>
			  </div>
			  
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary">Publish</button>
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