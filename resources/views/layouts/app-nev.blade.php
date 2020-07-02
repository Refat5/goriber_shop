<div class="warpper">
	
<!--  Navigation --> 

	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
		<div class="container">
 <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <a class="navbar-brand" href="{{route('index')}}">
    <img src="{{asset('images/logo2.png')}}" height="80px;" width="200">
  </a>
   
  <div class="collapse navbar-collapse topTitle" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item {{Route::is('index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
      </li>

        <li class="nav-item {{Route::is('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('about')}}">About <span class="sr-only">(current)</span></a>
      </li>

       <li class="nav-item {{Route::is('product') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('product')}}">Product <span class="sr-only">(current)</span></a>
      </li>

        <li class="nav-item {{Route::is('wishlist') ? 'active' : '' }}">
        <a class="nav-link" id="wishlist" href="{{route('wishlist')}}">Wish List <span class="sr-only">(current)</span></a>
      </li>

       <li class="nav-item {{Route::is('contact') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('contact')}}">Contact <span class="sr-only">(current)</span></a>
      </li>
     
      

      <li class="nav-item">
         <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">

          <div class="input-group mb-3">
      <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </div>
      </div>
    </form>
      </li>
    </ul>
     <ul class="navbar-nav ml-auto">

      <li>
        <a  href="{{route('carts')}}">
          <button class="badge badge-warning" style="height: 100%;width: 100%;">
            <span class="mt-1">Cart</span>
             <span class="badge badge-danger"  id="total_item">{{App\Cart::totalItem()}}</span>
            
          </button>
        
        </a>
      </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item {{Route::is('login') ? 'active' : '' }}  ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{Route::is('register') ? 'active' : '' }} ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <img class="img rounded-circle" src="{{App\Helpers\Image_helper::getUserImage( Auth::user()->id)}}" style="height: 28px;">
                                   
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                  <a class="dropdown-item" href="{{ route('user.dashboard') }}"
                                       >
                                        {{ __('My Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
   
  </div>
  </div>
</nav>
<!-- end Nev -->