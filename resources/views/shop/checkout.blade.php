@extends('layouts.app')

@section('title', 'Checkout Products')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<h1>Checkout processing</h1>
			<hr>
			<h4>Total: ${{ $totalPrice }}</h4>
			<form id="checkout-form" method="POST" action="{{ route('checkout') }}">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" id="name" required>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="address">Address:</label>
					<input type="text" class="form-control" id="address" required>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="card-name">Card name:</label>
					<input type="text" class="form-control" id="card-name" required>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="card-number">Card number:</label>
					<input type="text" class="form-control" id="card-number" required>
				</div>
			</div>

			<div class="col-xs-6">
				<div class="form-group">
					<label for="card-expiry-month">Card expiry month:</label>
					<input type="text" class="form-control" id="card-expiry-month" required>
				</div>
			</div>

			<div class="col-xs-6">
				<div class="form-group">
					<label for="card-expiry-year">Card expiry year:</label>
					<input type="text" class="form-control" id="card-expiry-year" required>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="card-cvc">CVC</label>
					<input type="text" class="form-control" id="card-cvc" required>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<input type="submit" value="Buy now" class="btn btn-success">
				</div>
			</div>
			{{csrf_field()}}
			</form>
		</div>		
	</div>
@endsection