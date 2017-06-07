@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
@if (Session::has('cart'))
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<ul class="list-group">
			@foreach ($products as $product)
				<li class="list-group-item">
				<span class="badge">{{ $product['quantity'] }}</span>
				<strong>{{ $product['product']['title'] }}</strong>
				<span class="label label-success">{{ $product['price'] }}</span>
				<div class="btn-group">
				
					<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#">Reduce by 1</a></li>
						<li><a href="#">Reduce All</a></li>
					</ul>
				
				</div>
				</li>
			@endforeach
		</ul>
	</div>				
</div>

<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
	<strong>Total: {{ $totalPrice }}</strong>
	</div>				
</div>
<hr>
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<button type="button" class="btn btn-success">Checkout</button>
	</div>				
</div>
@else
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
	<strong>No item's in the cart</strong>
	</div>				
</div>
@endif
@endsection