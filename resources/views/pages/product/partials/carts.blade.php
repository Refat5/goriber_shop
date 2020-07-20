@extends('layouts.app')
@section('content')
<div class="container mt-2">
	<h2 class="hader1">My Cart Item</h2>
	@if(App\Cart::totalItem() > 0)
	<table class="table table-bordered table-stripe" id="dataTable">
		<thead>
			<tr>
				<th>Sl No</th>
				<th>Product Title</th>
				<th>Product Image</th>
				<th>Product Quantity</th>
				
				<th>Single Price</th>
				<th>Sub Total Price</th>
				<th>Delete</th>

			</tr>
		</thead>
		<tbody>
			@php
			$total_price = 0;
			@endphp
			@foreach(App\Cart::totalCarts() as $cart)
			<tr>
				<td>{{$loop->index + 1}}</td>
				<td>
					<a href="{{route('product.show',$cart->product->p_slug)}}">{{$cart->product->p_title}}</a>
				</td>
				<td>
					@if($cart->product->images->count() > 0)

					<img src="{{asset('images/products/'. $cart->product->images->first()->image)}}" width="40px;">
					@endif
				</td>
				<td>
					<form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
						@csrf
						<input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
						<button type="submit" class="btn btn-success">Update</button>
					</form>
				</td>

					
				<td>
					{{$cart->product->p_price}} Taka
				</td>

				<td>
				@php
				$total_price += $cart->product->p_price * $cart->product_quantity;
				@endphp

					{{$cart->product->p_price * $cart->product_quantity}} Taka
				</td>
				<td>
					<form class="form-inline" action="{{route('carts.delete',$cart->id)}}" method="post">
						@csrf
						<input type="hidden" name="cart_id" class="form-control">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>

			</tr>
			@endforeach
			<tr>
				<td colspan="4"></td>
				<td>
					<strong>Total Amount=</strong>
				</td>
				<td colspan="2">
					<strong>{{$total_price}} Taka</strong></td>
			</tr>
		</tbody>
	</table>
	<div class="float-right">
		<a href="{{route('product')}}" class="btn btn-info btn-lg"> Continue Shopping..</a>
		<a href="{{route('checkout')}}" class="btn btn-warning btn-lg"> Checkout</a>

	</div>
	@else
	<div >
		<strong class="alert alert-warning">There is no Cart Item </strong>
		<br>
		<br>

		<h3 class="alert alert-danger">Gorib Kothakar Age kichu kin tarpor Bari neowar cinta korish..</h3>
		<br>
		<a href="{{route('product')}}" class="btn btn-info btn-lg"> Continue Shopping..</a>

	</div>


	@endif
	
	
</div>
 @include('pages.product.partials.footerBtoom')
@endsection