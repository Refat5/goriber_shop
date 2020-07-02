$.ajaxSetup({
	headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

})
function addCart(product_id)
{
	$.post("http://127.0.0.1:8000/api/cart/store/",
	{
		product_id: product_id

	})
	.done(function( data )
	{
          
		data = JSON.parse(data);
		if (data.status == 'success') 
		{
			  // Success Type
            $('#cart').on('click', function() {
               alertify.set('notifier','position', 'top-right');
                 alertify.success('Item Added To Cart successfully');
            });

			$("#total_item").html(data.totalItem);
		}

	});
}