@extends('layouts.app')
@section('content')

<div class="container mt-2">
<div class="card card-body">
	<div class="card-header"><h2>Confirm Item</h2></div>
	<div class="row card-body">
		<div class="col-md-7 border-right">
			@foreach(App\Cart::totalCarts() as $cart)
	<p>
		{{$cart->product->p_title}}-
		<strong>{{$cart->product->p_price}} Taka</strong>
		--{{$cart->product_quantity}}
	</p>
	@endforeach
			
		</div>
		<div class="col-md-5">
			@php
			$total_price = 0;
      $shipping_cost = 100;

			@endphp
				@foreach(App\Cart::totalCarts() as $cart)
				@php
				$total_price += $cart->product->p_price * $cart->product_quantity;
				@endphp
	
	            @endforeach
      <p>Total Price: <strong>{{$total_price}}</strong>Taka</p>

       <p>Total Price With Shipping cost: <strong>{{ $total_price + $shipping_cost }}</strong>Taka</p>
			
		</div>
	</div>

	
	
	<p>
			<a href="{{route('carts')}}"><button class="btn btn-info">Chenge Cart Item</button></a>
	</p>
	</div>

	<div class="card card-body">
	<div class="card-header"><h2>Shipping Address</h2></div>
	<div class="row mt-2">
	
	</div>

	           <form method="POST" action="{{ route('checkout.store') }}">
                        @csrf
                        @include('pages.msg.msg')

                        <div class="form-group row">
                            <label for="recever_name" class="col-md-4 col-form-label text-md-right">{{ __('Recever Name') }}</label>

                            <div class="col-md-6">
                                <input id="recever_name" type="text" class="form-control @error('recever_name') is-invalid @enderror" name="name" value="{{Auth::check() ? Auth::user()->first_name. '' . Auth::user()->last_name : ''}}" required autocomplete="recever_name" autofocus>

                                @error('recever_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $recever_name }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                     
                         <div class="form-group row">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ Auth::check() ? Auth::user()->mobile_no  : '' }}" required autocomplete="mobile_no" autofocus>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

         

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                             <textarea  class="col-md-8" id="shipping_address" rows="4" name="shipping_address" required >{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message(Optional)') }}</label>

                            <div class="col-md-6">
                             <textarea  class="col-md-8" id="message" rows="4" name="message"  ></textarea>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Select a payment method') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="payment_method_id" id="payments" required>
                              	<option value="">Please Select a payment method </option>
                              	@foreach($payments as $payment)
                              	<option value="{{$payment->short_name}}">{{$payment->short_name}}</option>
                              	@endforeach
                              	
                              </select>
                              @foreach($payments as $payment)
                              
                              	@if($payment->short_name == "cash_in")
                              	<div id="payment_{{$payment->short_name}}" class=" alert alert-success hidden">
                              		<h3>
                              			For Cash in there in nothing necessary. just click finish Order.
                              			<br>
                              			<small>
                              				You will get your product in tow or three Days
                              			</small>
                              		</h3>
                              	</div>
                              	@else
                              		<div id="payment_{{$payment->short_name}}" class=" alert alert-success hidden">
                              		<h3>{{$payment->name}}Payment</h3>
                              		<p>
                              			<strong>{{$payment->name}} No : {{$payment->no}}</strong>
                              			<br>
                              			<strong>Account Type:{{$payment->type}}</strong>
                              			<br>
                              			Please send the above money to this Bkash no and writen your transaction belwo there...

                              		</p>
                              		
                              	</div>
                              	@endif
                              

                              @endforeach

                              		<input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Please Enter Your transaction Number" required>

                              </div>
                            </div>
                             <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>

                       
	

	</div>
	
</div>
@endsection
@section('script')
<script type="text/javascript">
	
		$("#payments").change(function()
		{
			$payment_method = $ ("#payments").val();
			if ($payment_method == "cash_in")
			 {
			 	$("#payment_cash_in").removeClass('hidden');
			 	$("#payment_bikash").addClass('hidden');
			    $("#payment_roket").addClass('hidden');
			    $("#payment_nogod").addClass('hidden');
           


			 }
			 else if ($payment_method == "bikash")
			 {
			 	$("#payment_bikash").removeClass('hidden');
			 	$("#payment_cash_in").addClass('hidden');
			    $("#payment_roket").addClass('hidden');
			    $("#payment_nogod").addClass('hidden');
			    $("#transaction_id").removeClass('hidden');


			 }
			  else if ($payment_method == "roket")
			 {
			 	$("#payment_roket").removeClass('hidden');
			 	$("#payment_bikash").addClass('hidden');
			    $("#payment_cash_in").addClass('hidden');
			    $("#payment_nogod").addClass('hidden');
			    $("#transaction_id").removeClass('hidden');
			 }
			  else if ($payment_method == "nogod")
			 {
			 	$("#payment_nogod").removeClass('hidden');
			 	$("#payment_bikash").addClass('hidden');
			    $("#payment_roket").addClass('hidden');
			    $("#payment_cash_in").addClass('hidden');
			    $("#transaction_id").removeClass('hidden');
			 }
		})
	
	
</script>
@endsection