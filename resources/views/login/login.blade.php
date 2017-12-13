@extends('layouts.master')

@section('content')

<br>

<div class="card">
	<h3 class="card-header">Login Form</h3>
	<div class="card-body">
		<form method="POST" action="/login">

			{{ csrf_field() }}

			<div class="form-group">
				@include('layouts.error')
			</div>

			<div class="form-group">
				<label for="email">E-mail</label>
				<input name="email" type="text" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" type="password" class="form-control">	      
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>

		</form>

	</div>

	<div class="card-footer">
		<p>Don't have account? <a href="/register"> Register here</a></p>
	</div>

</div>


@endsection