@extends('admin.layouts.app')
@section('content')

      <div class="vontent-wrapper">

          <div class="card-header">
            View Order #GD{{$order->id}}
            @include("admin.pages.message.validate ")
            
          </div>
          <div class=" card card-body">
            <h3>Order Information</h3>
            <div class="row">
              <div class="col-md-7 border-right">
                <p><strong>Order Name:{{$order->name}}</strong></p>
                <p><strong>Order Mobile:{{$order->mobile_no}}</strong></p>
                <p><strong>Order Email:{{$order->email}}</strong></p>
                <p><strong>Order Shipping Address:{{$order->shipping_address}}</strong></p>

             </div>  
              <div class="col-md-5">
                <p><strong>Order Payment Method:{{$order->payment->name}}</strong></p>
                 <p><strong>Order Payment Transaction:{{$order->transaction_id}}</strong></p>
                
              </div> 
               
              
              
            </div>
            <hr>

          </div>
          <h3>Order Items :</h3>

          <div class="card-body">
              @if($order->carts->count() > 0)
  <table class="table table-bordered table-stripe" id="dataTable">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Quantity</th>
        
        <th>Single Price</th>
        <th>Sub Total Price</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>
      @php
      $total_price = 0;
      @endphp
      @foreach($order->carts as $cart)
      <tr>
        <td>{{$loop->index + 1}}</td>
        <td>
          <a href="{{route('product.show',$cart->product->p_slug)}}">{{$cart->product->p_title}}</a>
        </td>
        <td>
          @if($cart->product->images->count() > 0)

          <img src="{{asset('images/products/'. $cart->product->images->first()->image)}}" width="40px;">
          @endif
        </td>
        <td>
          <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
            @csrf
            <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </td>

          
        <td>
          {{$cart->product->p_price}} Taka
        </td>

        <td>
        @php
        $total_price += $cart->product->p_price * $cart->product_quantity;
        @endphp

          {{$cart->product->p_price * $cart->product_quantity}} Taka
        </td>
        <td>
          <form class="form-inline" action="{{route('carts.delete',$cart->id)}}" method="post">
            @csrf
            <input type="hidden" name="cart_id" class="form-control">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>

      </tr>
      @endforeach
      <tr>
        <td colspan="4"></td>
        <td>
          <strong>Total Amount=</strong>
        </td>
        <td colspan="2">
          <strong>{{$total_price}} Taka</strong></td>
      </tr>
    </tbody>
  </table>
  
  @else
  <div class="alert alert-warning">
    <strong>There is no Cart Item </strong>
   

  </div>


  @endif
  <hr>
  <form action="{{route('admin.order.charge',$order->id)}}" method="post">
    @csrf
    <label>Shipping_Charge</label>
    <input type="number" name="shipping_charge" id="shipping_charge" value="{{$order->shipping_charge}}">
    <br>

    <label>Custom Discount</label>
    <input type="number" name="custom_discount" value="{{$order->custom_discount}}">
    <br>
    <input type="submit" name="" value="update" class="btn btn-success">

    <a href="{{route('admin.order.invoice',$order->id)}}" class="btn btn-info">Genarate Invoice</a>
  </form>
  <hr>
  <form action="{{route('admin.order.completed',$order->id)}}" class="form-inline" style="display: inline-block;" method="post">
    @csrf
    @if($order->is_completed)
    <input type="submit" name="" value="Cencel Order" class="btn btn-danger">
    @else
    <input type="submit" name="" value="Complete Order" class="btn btn-success">
    @endif
  </form>

  <form action="{{route('admin.order.paid',$order->id)}}" class="form-inline" style="display: inline-block;" method="post">
    @csrf
    @if($order->is_paid)
    <input type="submit" name="" value="Cencel Payment" class="btn btn-danger">
    @else
    <input type="submit" name="" value="Paid Order" class="btn btn-success">
    @endif
  </form>
          </div>
        </div>
      
    

 @endsection

                  