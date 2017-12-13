@extends('layouts.master')

@section('content')

<div class="card my-4">
	<h3 class="card-header">Register Form</h3>
	<div class="card-body">

		<form method="POST" action="/register">

			{{ csrf_field() }}

			<div class="form-group">
				@include('layouts.error')
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input name="name" type="text" class="form-control" value=" {{ old('name') }} ">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input name="username" type="text" class="form-control" value=" {{ old('username') }} ">
			</div>

			<div class="form-group">
				<label for="email">E-mail</label>
				<input name="email" type="text" class="form-control" value=" {{ old('email') }} ">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" type="password" class="form-control">	      
			</div>

			<div class="form-group">
				<label for="password">Password Confirmation</label>
				<input name="password_confirmation" type="password" class="form-control">	      
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

		</form>
	</div>
	<div class="card-footer">
		<p>Already have account? <a href="/register"> Login here</a></p>
	</div>
</div>

@endsection