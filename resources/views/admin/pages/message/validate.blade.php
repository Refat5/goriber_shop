@if($errors->any())
			<div class="container">
			  <div class="row justify-content-center">
			     <div class="col-md-8">
			       <div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
						@endforeach
					</ul>
			 </div>
			</div>
		 </div>
	  </div>
@endif 
@if(Session::has('success'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="alert alert-success">
	<ul>
		<p>{{ Session::get('success') }}</p>
		
	</ul>
	
</div>
</div>
		 </div>
	  </div>

@endif 
@if(Session::has('errors'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="alert alert-danger">
	<ul>
		<p>{{ Session::get('errors') }}</p>
		
	</ul>
	
</div>
</div>
		 </div>
	  </div>
@endif 

@if(Session::has('error'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="alert alert-danger">
	<ul>
		<p>{{ Session::get('error') }}</p>
		
	</ul>
	
</div>
</div>
		 </div>
	  </div>
@endif
