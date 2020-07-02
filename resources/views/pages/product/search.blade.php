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
				<h3> Searched Result For-  <span class="badge badge-info">{{$search}}</span></h3>

		@include('pages.product.partials.allproduct')
	</div>
	<div class="widget">
		
	</div>
			
		</div>

	</div>
</div>
@endsection
<!-- end sidebar -->