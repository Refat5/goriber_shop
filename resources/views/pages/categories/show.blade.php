
@extends('layouts.app')
@section('content')
<!--  start sidebar -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
		@include('layouts.app-sidebar')
			
		</div>
		<div class="col-md-9">
			<div class="widget mar-top-20">
				<h3>All Product   <span class="badge badge-info">{{$category->c_name}}  Category</span></h3>
				@php
				$product = $category->product()->paginate(9);
				@endphp

				@if($product->count()>0)
				@include('pages.product.partials.allproduct')
				@else
				<div class="alert alert-warning	">
					No Products has Added Yet in this Category!
				</div> 
				@endif

		
	</div>
	<div class="widget">
		
	</div>
			
		</div>

	</div>
</div>
@endsection
<!-- end sidebar -->