@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>



<div class="container-fluid">
  <div style="text-align:center">
  	<div class="topFixedBannerContact">
                  <div class="topBannerOverlayContact">
                      <div class="topContent">
                          
                              <h1 class="topTitleproduct text-center"> Contact us</h1>
                              <p class="topTitle">Swing by for a cup of coffee, or leave us a message:</p>
                           
                             
                          
                      </div>
                  </div>

              </div>
   
  </div>
  <div class="row">
    <div class="column">
    	<div class="card mt-5">
    	<h2>Our Facebook Page</h2>
    	<a href="https://www.messenger.com/t/r3dr0k37" class="btn btn-success">Click</a>
    	<br>
    	<h6>Mobile Number:<b>++01305976639</b></h6>
    	</div>
    	<br>
    	<br>

    	<h2>Messenger Inbox</h2>
    	<a href="https://www.messenger.com/t/r3dr0k37" class="btn btn-success">Click</a>
    	<br>
      <br><br><br>
      <h2>Gmail</h2>
      <p>mdrefat382139@gmail.com</p>

      
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Email Address</label>
        <input type="text" id="lname" name="email" placeholder="Your Emial Addre..">
        
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>

</body>
</html>

@endsection
<!-- end sidebar -->