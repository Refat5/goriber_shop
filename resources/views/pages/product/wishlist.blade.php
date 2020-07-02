@extends('layouts.app')
@section('content')
<div class="container mt-2">
	<h2>My wishlist Item</h2>
	@if(App\wishlist::totalItemw() > 0)
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
			@foreach(App\wishlist::totalwishlist() as $wishlist)
			<tr>
				<td>{{$loop->index + 1}}</td>
				<td>
					<a href="{{route('product.show',$wishlist->product->p_slug)}}">{{$wishlist->product->p_title}}</a>
				</td>
				<td>
					@if($wishlist->product->images->count() > 0)

					<img src="{{asset('images/products/'. $wishlist->product->images->first()->image)}}" width="40px;">
					@endif
				</td>
			
                <td>
					{{$wishlist->product->p_quantity}} 
				</td>
					
				<td>
					{{$wishlist->product->p_price}} Taka
				</td>

				<td>
				@php
				$total_price += $wishlist->product->p_price * $wishlist->product_quantity;
				@endphp

					{{$wishlist->product->p_price * $wishlist->product_quantity}} Taka
				</td>
				<td>
					<form class="form-inline" action="{{route('wishlist.delete',$wishlist->id)}}" method="post">
						@csrf
						<input type="hidden" name="wishlist_id" class="form-control">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>

			</tr>
			@endforeach
			
		</tbody>
	</table>
	<div class="float-right">
		<a href="{{route('product')}}" class="btn btn-info btn-lg"> Continue Shopping..</a>
		

	</div>
	@else
	<div >
		<strong class="alert alert-warning">There is no wishlist Item </strong>
		<br>
		<br>

		<h3 class="alert alert-danger">Gorib Kothakar Age kichu kin tarpor Bari neowar cinta korish..</h3>
		<br>
		<a href="{{route('product')}}" class="btn btn-info btn-lg"> Continue Shopping..</a>

	</div>


	@endif
	
	
</div>
@endsection
