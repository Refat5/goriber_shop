      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('images/profile1.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Abdur Rahim</p>
                  
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
            

               <a class="nav-link" href="{{route('admin.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Dashboard')}}</span>
              </a>
               
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.slider.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Manage Slider')}}</span>
              </a>
            </li>
                    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    User permission
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Roles</a>
    <a class="dropdown-item" href="#">Permissions</a>
    <a class="dropdown-item" href="#">Roles Permission</a>
    <a class="dropdown-item" href="#">User Roles</a>
  </div>
</div>

             <li class="nav-item">
              <a class="nav-link" href="{{route('admin.order.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Order List')}}</span>
              </a>
            </li>

             
          <!--   <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">{{ __('customLanguage.Product')}}</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product.create')}}">{{ __('customLanguage.Add Product')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product.list')}}">{{ __('customLanguage.Product List')}}</a>
                  </li>
                 
                </ul>
              </div>
            </li> -->


             <li class="nav-item">
              <a class="nav-link" href="{{route('admin.product.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Product List')}}</span>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="{{route('admin.category.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Category List')}}</span>
              </a>
            </li>



             <li class="nav-item">
              <a class="nav-link" href="{{route('admin.brands.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Brands')}}</span>
              </a>
            </li>
         <!--     <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">{{ __('customLanguage.Brands')}}</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands.create')}}">{{ __('customLanguage.Add Brand')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands.list')}}">{{ __('customLanguage.Brand List')}}</a>
                  </li>
                 
                </ul>
              </div>
            </li> -->
              <li class="nav-item">
              <a class="nav-link" href="{{route('admin.division.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.Division')}}</span>
              </a>
            </li>


              <li class="nav-item">
              <a class="nav-link" href="{{route('admin.district.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">{{ __('customLanguage.District')}}</span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- partial -->
        <div class="main-panel">