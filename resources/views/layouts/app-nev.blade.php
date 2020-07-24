
<style type="text/css">
  .fdesign{font-size: 18px;
font-weight: 400;
font-family: initial;}
.bord{
  padding: 2px 8px 11px 5px;
}
.mar{
  margin-left: 30px;

}
</style>

<div class="warpper">
	
<!--  Navigation --> 

	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
		
 <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
  <a class="navbar-brand" href="{{route('index')}}">
    <img src="{{asset('images/logo2.png')}}" height="80px;" width="200">
  </a>
   
  <div class="collapse navbar-collapse topTitle" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       <li class=" {{Route::is('index') ? 'active' : '' }}">
        <i class="fa fa-home mar" ></i>   <a class="nav-link fdesign" href="{{route('index')}}">Home </a>
      </li>

        <li class=" {{Route::is('about') ? 'active' : '' }}">
        <i class="fa fa-address-card mar"></i><a class="nav-link fdesign" href="{{route('about')}}">About</a>
      </li>

       <li class=" {{Route::is('product') ? 'active' : '' }}">
         <i class="fa fa-product-hunt mar"></i><a class="nav-link fdesign" href="{{route('product')}}">Product </a>
      </li>

        <li class=" {{Route::is('wishlist') ? 'active' : '' }}">
         <i class="fa fa-heart mar" ></i><a class="nav-link fdesign" id="wishlist" href="{{route('wishlist')}}">Wish List</a>
      </li>

       <li class=" {{Route::is('contact') ? 'active' : '' }}">
         <i class="fa fa-phone mar"></i><a class="nav-link fdesign" href="{{route('contact')}}">Contact </a>
      </li>

    </ul>

      <li class="">
         <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">

          <div class="input-group mb-3">
      <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </div>
      </div>
    </form>
      </li>

     <ul class="navbar-nav ml-auto">

      <li>
        <i class="fa fa-cart-plus mar"  ></i>
        <a  href="{{route('carts')}}">
          <button class="badge badge-warning" style="height: 65%;width: 70%;">
            <span>Cart</span>
             <span class="badge badge-danger"  id="total_item">{{App\Cart::totalItem()}}</span>
            
          </button>
        
        </a>
      </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="{{ Route::is('login') ? 'active' : '' }}  ">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class=" {{Route::is('register') ? 'active' : '' }} ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class=" dropdown">
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
  
</nav>
<!-- end Nev -->