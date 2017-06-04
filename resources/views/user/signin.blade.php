@extends('layouts.app')

@section('title', 'Login page');

@section('content')
	
<div class="row">
	<div class="col-md-4 col-md-offset-4">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</div>
	@endif
	<div class="alert bg-info">
	<h3 class="text-center">Login page</h3>
	</div>
		<form method="POST" action="{{ route('users.signin') }}">
		{{csrf_field()}}
			<fieldset class="form-group">
				<label for="email">E-mail</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
			</fieldset>
			<fieldset class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" >
			</fieldset>
			<fieldset class="form-group">
				<input type="submit" class="btn btn-primary" value="Login">
			</fieldset>
		</form>
	</div>
</div>

@endsection