
				<div class="row">
					@foreach ($product as $pro)
					

					<div class="col-md-4">
						<div class="card">
							@php $i = 1; @endphp
							@foreach ($pro->Images as $img)
							@if($i > 0)
							<a href="{{route('product.show', $pro->p_slug)}}">
							<img class="card-img-top img-style" src="{{asset('images/products/'. $img->image)}}" alt="{{$pro->p_title}}">
						</a>
							 @endif	
							@php $i--; @endphp

							@endforeach 


							<div class="card-body">
								<h4 class="  card-title">
									<a href="{{route('product.show', $pro->p_slug)}}">{{$pro->p_title}}</a>
								</h4>
								<p class="card-text">${{$pro->p_price}}</p>
								@include('pages.product.partials.cart-button')
								<button type="button" class="btn btn-info" id="wishbutton{{$pro->id}}" onclick="wishlist('{{$pro->id}}')"><i class="fa fa-plus"></i>Wishlist</button>
							</div>
						</div>
					</div>	


					@endforeach
					
				</div>




				
				
				 
@section('script')
<script type="text/javascript">

	$.ajaxSetup({ 
	headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

})
function wishlist(product_id)
{
	$.post("http://127.0.0.1:8000/wishlist/store/",
	{
		product_id: product_id

	})
	.done(function( data )
	{
          
		data = JSON.parse(data);
		if (data.status == 'success') 
		{
			  // Success Type
            $("#wishbutton"+product_id).on('click', function() {

            	 alertify.set('notifier','position', 'top');
                 alertify.success('Item Added To wishlist successfully');
            });

			$("#wishlist").html(data.totalItemw);
		}

	});
}
	
</script>
@endsection