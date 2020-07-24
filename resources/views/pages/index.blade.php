@extends('layouts.app')
@section('content')
<!--  start slider -->

<div class="content text-center"  >
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach($sliders as $slider)
           <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>

          @endforeach
         
         
        </ol>
        <div class="carousel-inner">
          @php
          $i = 1;
          @endphp
          @foreach ($sliders as $slider )

            <div class=" p-0 carousel-item {{ $i == 1 ? 'active':''}} col-md-10 ">
            <img class="slider" src="{{asset('images/sliders/'.$slider->image)}}" alt="{{$slider->title}}" style="height: 600px;width: 1400px;" >

            <div class="carousel-caption d-none d-md-block slider-text">
               <h2 class="h2">I may be poor but not a beggar <span style="color: yellow;">😇😇</span></h2>

              <h5 class="h5">{{ $slider->title}}</h5>

              @if($slider->button_text)
              <a href="{{$slider->button_url}}" target="blank" class="btn btn-warning url">{{$slider->button_url}}</a>
              @endif
            </div>
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
  
</div>


	<div class="row">
		<div class="col-md-3">
			@include('layouts.app-sidebar')
			
		</div>

		<div class="col-md-9">
			<div class="widget mar-top-20">
				<h3 class="forh3">Featured Product</h3>
				<div class="row">

				@include('pages.product.partials.allproduct')

				</div>
				<div class="pagination">
					{{$product->links()}}
		
					
				</div>
			</div>
			
		</div>

	</div>


<br><br>
  @include('pages.product.partials.footerBtoom')


@endsection
<!-- end sidebar -->