<!DOCTYPE html>
<html>
<head>
  <title>Invoice - {{ $order->id }}</title>
 
  <style type="text/css">
    .content-wrapper
    {
      background: #fff;
    }
    .site-logo
    {
      height: 186px;

      width: 200px;
    }
    .site-address
    {
      float: right;

border: 2px solid whitesmoke;

font-size: medium;
    }
    .invoice-header
    {
      background: whitesmoke;
    }
  </style>
</head>
<body>

    <div class="content-wrapper">
      <div class="invoice-header">
       
        <div class="float-left site-logo">
          
          <img class="site-logo" src="{{asset('images/foods/category-1.jpg')}}">

          
        </div>
        <div class="float-right site-address">
          <h3>Gorib er Shop</h3>
          <p>Jana Nai Address</p>
          <p>Phone <a href="">02998424</a></p>
          <p>Email: <a href="mailto:info@abrefat2190.com">info@abrefat2190.com</a></p>
          
        </div>
        <div class="clearfix"></div>
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

      
        </div>
</body>
</html>

  

                  