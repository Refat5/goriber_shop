@extends('layouts.app')
@section('content')
<!--  start sidebar -->
<div class="container-fluid">

      <div class="topFixedBannerProduct">
                  <div class="topBannerOverlay">
                      <div class="topContent">
                          
                              <h1 class="topTitleproduct text-center"> Products</h1>
                           
                             
                          
                      </div>
                  </div>

              </div>
    
	<div class="row">
		<div class="col-md-3">
		@include('layouts.app-sidebar')
			
		</div>
		<div class="col-md-9">
			<div class="widget mar-top-20">
				<h3>All Product</h3>

		@include('pages.product.partials.allproduct')
	</div>
	<div class="widget">
		
	</div>
			
		</div>

	</div>
</div>
@endsection
<!-- end sidebar -->