    <link rel="shortcut icon" href="{{asset('assets/images/favicon2.png')}}" />

@include('admin.layouts.app-js')
@include('admin.layouts.app-css')
@include('admin.layouts.app-nev')
@include('admin.layouts.app-sidebar')


 @yield('content')
@include('admin.layouts.app-footer')
