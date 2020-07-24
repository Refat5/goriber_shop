@extends('layouts.app')

@section('content')

<head>
    <title>Register Form</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/userRegister.css')}}">
</head>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3 style="border-radius: 1.5rem; padding: 2%; border: none;">Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                      
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h2 class="register-heading">User Register</h2>
                                <form method="POST" action="{{ route('register') }}">@csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"placeholder="First Name *"  name="first_name" value="{{ old('first_name') }}"autofocus>

                                        </div>
                                        <div class="form-group">
                                             <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name *" name="last_name" value="{{ old('last_name') }}"autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password *">
                                          
                                        </div>
                                        <div class="form-group">
                                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password *" >
                                            
                                        </div>

                                        <div class="form-group">
                                            <input id="street_address" type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ old('street_address') }}"  autofocus placeholder="Street Address">
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="1" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="2">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email *" >
                                            
                                        </div>
                                        <div class="form-group">
                                            <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}"autofocus placeholder="Phone No">
                                        </div>
                                        <div class="form-group">
                               <select class="form-control" name="division_id" id="division_id">
                                <option value=""> Please select a Division</option>
                                @foreach ($divisions as $division)
                                <option value="{{$division->id}}">{{$division->d_name}}</option>
                                 @endforeach 
                              </select>
                              <br>
                                 <div class="form-group">
                                     <select class="form-control" name="district_id" id="district_id">
                      
                                   </select>       
                                </div>
                                        <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
</body>
@endsection

@section('script')
<script type="text/javascript">
    $("#division_id").change(function()
    {

        var division = $("#division_id").val();
        //send an ajax request to server with this division
        $("#district_id").html("");
        var option = "";

        $.get("http://127.0.0.1:8000/get-distric/"+division,function(data)
        {
            data = JSON.parse(data)
            data.forEach(function(element)
            {
                option += "<option value='"+ element.id+"'>"+ element.ds_name+"</option>";
               

            });

         $("#district_id").html(option);


        });

    })
    
</script>
@endsection

