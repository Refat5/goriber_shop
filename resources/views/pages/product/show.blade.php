@extends('layouts.app')
@section('title')
{{$product->p_title}}|Gorib er shop
@endsection
@section('content')
<!--  start sidebar -->
<div class="container">
	<div class="row">
		<div class="col-md-4">

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol><br><br><br>
        <div class="carousel-inner">
        	@php
        	$i = 1;
        	@endphp
        	@foreach ($product->Images as $img )

        		<div class="product carousel-item {{ $i == 1 ? 'active':''}} ">
            <img class="products-item" src="{{asset('images/products/'.$img->image)}}" alt="First slide" >
          </div>
          @php
        	$i++;
        	@endphp
        	 @endforeach     
        </div>
        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="mt-3">
        <p>Category <span class="badge badge-info">{{$product->category->c_name}}</span></p>
         <p>Brand <span class="badge badge-info">{{$product->brand->b_name}}</span></p>
      </div>
			
		</div>
		<div class="col-md-8">
			<div class="widget mar-top-20">
				<h3>{{$product->p_title}}</h3>
				<h3>{{$product->p_price}} Taka
				<span class="badge badge-info">
					{{$product->p_quantity <1 ? 'No Item Is Avalible' : $product->p_quantity. '   Item Is Stock'}}
				</span>
				</h3>
				<hr>
				<div class="product-description">
					{{$product->p_description}}
				</div>


	</div>
	<div class="widget">
		
	</div>
			
		</div>

	</div>
</div>
@endsection
<!-- end sidebar -->