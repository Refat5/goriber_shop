

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $order->id }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .invoice{
          margin-leftt:40%;

        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
               
                <pre>
                <strong>Order Name:{{$order->name}}</strong><br>
                <strong>Order Mobile:{{$order->mobile_no}}</strong><br>
                Order Email:{{$order->email}}
                Order Shipping <Address:>{$order->shipping_address}</Address:>
                <br>
                Order Payment Method:{{$order->payment->name}}
                 Order Payment Transaction:{{$order->transaction_id}}

            </td>
            <td align="center">
                <img src="{{asset('images/logo6.svg')}}" alt="Logo" width="100" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>Gorib Er shop</h3>
                <pre>
                    https://Gorib.com

                    Street 26
                    123456 Dhaka
                    Bangladesh Dhaka
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div >
    <h3>Invoice specification{{ $order->id }}</h3>


      
			
      <table class="table table-bordered table-stripe" id="dataTable">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th> Quantity</th>
        
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
         
            {{$cart->product_quantity}}
           
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
  @php $shipping_cost=100; @endphp
  Total Price With Shipping cost: <strong>{{ $total_price + $shipping_cost }}</strong>Taka</p>
</div>

<div class="information" style="position: absolute; bottom: ;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 100%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 100%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>





















                  