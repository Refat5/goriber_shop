@extends('pages.user.master')
@section('sub-content')
<div class="container ">
	<h2 > Welcome  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h2>
	<p>You can change tour profile and every information here..</p>

	<hr>
	

	<div class="row">
		<div class="col-md-4">
			<div class="card card-body mt-2 pointer" onclick="location.href='{{route('user.profile')}}'">
				<h5>Update Your Profile</h5>
			</div>
		</div>
		<div class="col-md-6">
			<img src="{{asset('images/gorib.jpeg')}}">

		</div>
	</div>
	 
	
</div>
@endsection