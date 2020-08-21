@extends('layouts.app')
@section('content')


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}


.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  
  background-color: #FF7588;
  text-align: center;
  cursor: pointer;
  width: 100%;
}
.img{
	border-radius: 50px;
}

.button:hover {
  background-color: #00B5ED;
}
.overlayAbout{
  position: absolute;
  margin-left: 30%;
  background: rgb(6 5 5 / 80%);
  margin-top: 6rem;
  

}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">

<div class="overlayAbout">
<h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>

</div>

</div>

<h2 style="text-align:center" class="mt-5 forh3 ">Our Team</h2>
<div class="row mt-5">
  <div class="column ">
    <div class="card">
      <img src="../images/profile1.jpg" class="img" alt="Jane" style="width:100%" height="40%">
      <div class="container">
        <h2>Abuder Rahim Refat</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../images/profile2.jpg" class="img" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Tanvir Hossin</h2>
        <p class="title">Developer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card ">
      <img src="../images/profile.jpg" class="img" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Komol Chandro</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  

</div>


</br>

@include('pages.product.partials.footerBtoom')
@endsection
<!-- end sidebar -->