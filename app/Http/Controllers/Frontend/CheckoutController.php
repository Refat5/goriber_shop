<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use Auth;
use App\Order;
use App\Cart;

class CheckoutController extends Controller
{
   public function index()
   {
   	$payments = Payment::orderBy('priority','asc')->get();
   	return view('pages.product.checkout',compact('payments'));
   }

   public function store(Request $request)
   {
   	$request->validate([
   		'name' => 'required',
   		'mobile_no' => 'required',
   		'shipping_address' => 'required',
   		'payment_method_id' => 'required',

   	]);
   	$order = new Order();
   	//check transaction Id has given or not 

   	if ($request->payment_method_id != 'cash_in') 
   	{
   		if ($request->transaction_id == NULL || empty($request->transaction_id)) 
   		{
   			session()->flash('error','Please give transaction Id for Your Payment');
   			return back();
   		}
   	}
   	$order->name = $request->name;
   	$order->email = $request->email;
   	$order->mobile_no = $request->mobile_no;
   	$order->shipping_address = $request->shipping_address;
   	$order->message = $request->message;
   	$order->ip_address = request()->ip();
   	$order->transaction_id = $request->transaction_id;

    if (Auth::check())
     {
    	$order->user_id = Auth::id();
    }


   	$order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;
   	$order->save();

   	foreach (Cart::totalCarts() as $cart)  
   	{
   		$cart->order_id = $order->id;
   		$cart->save();
   	}

      foreach (Cart::totalCarts() as $cart)  
      {
         $cart->delete();
      }

   	session()->flash('success','Your order has taken successfully!! Please Wait admin will soon confirm it');
   			return redirect()->route('index');



   }

}
