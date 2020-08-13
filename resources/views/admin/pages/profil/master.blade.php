@extends('admin.layouts.app')
@section('content')
<div class="container mt-2">
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
				
					 <img alt="image" height="120" src="{{Auth::user()->avater ? '/images/admin/'.Auth::user()->avater : '/profile.png'}}" class="rounded-circle profile-widget-picture">
				
				
				<a href="" class="list-group-item {{Route::is('admin.dashboard') ? 'active' : ''}}">Dashboard</a>
				<a href="" class="list-group-item {{Route::is('admin.profile') ? 'active' :  ''}}">Update Profile</a>
				<a href="" class="list-group-item">Logout</a>

			</div>
		</div>
		<div class="col-md-8" style="margin-bottom: 8%;">
			@yield('sub-content')
		</div>
	</div>
	
</div>
@endsection