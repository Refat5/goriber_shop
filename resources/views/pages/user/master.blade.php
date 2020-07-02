@extends('layouts.app')
@section('content')
<div class="container mt-2">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
				<a href="" class="list-group-item">
				 <img class="img rounded-circle" src="{{App\Helpers\Image_helper::getUserImage( Auth::user()->id)}}" style="height: 120px;">
					
				</a>
				<a href="" class="list-group-item {{Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
				<a href="" class="list-group-item {{Route::is('user.profile') ? 'active' :  ''}}">Update Profile</a>
				<a href="" class="list-group-item">Logout</a>

			</div>
		</div>
		<div class="col-md-8" style="margin-bottom: 8%;">
			@yield('sub-content')
		</div>
	</div>
	
</div>
@endsection