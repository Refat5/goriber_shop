<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use  PDF;

class OrderController extends Controller
{

	   public function __construct()
  {
    $this->middleware('auth:admin');
  }

    public function list()
    {
    	$orders = Order::orderBy('id')->get();
    	return view('admin.pages.order.index',compact('orders'));
    }

     public function delete($id)
    {
    	$order = Order::find($id);
    	$order->delete();
    	session()->flash('success','Order Deleted Successfully GOlam !!');
    	return back();
    }

     public function view($id)
    {
    	$order= Order::find($id);
    	$order->is_seen_by_admin = 1;
    	$order->save();
    	return view('admin.pages.order.view',compact('order'));
    }

     public function completed($id)
    {
    	$order= Order::find($id);
    	if ($order ->is_completed) 
    	{
    		
    		$order->is_completed = 0;
    	}
    	else
    	{
    		$order->is_completed = 1;
    	}
    	$order->save();
    	session()->flash('success','Order completed status changed.!');
    	return back();
    }

     public function paid($id)
    {
    	$order= Order::find($id);
    	if ($order ->is_paid) 
    	{
    		
    		$order->is_paid = 0;
    	}
    	else
    	{
    		$order->is_paid = 1;
    	}
    	$order->save();
    	session()->flash('success','Order Paid status changed.!');
    	return back();
    }

    public function charge(Request $request, $id)
    {
        $order = Order::find($id);

        $order->shipping_charge = $request->shipping_charge;
        $order->custom_discount = $request->custom_discount;
        $order->save();
        session()->flash('success','Order charge and discount|changed...!');
        return back();
    }

    public function invoice($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('admin.pages.order.invoice', compact('order'));
       return view('admin.pages.order.invoice',compact('order'));

        /*return $pdf->stream('invoice.pdf');*/
    }
}
