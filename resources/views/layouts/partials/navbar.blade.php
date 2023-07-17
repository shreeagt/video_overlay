<style>
  a.active{
    background-color: #75bdd9;
    color: #041E42;
  }
</style>
<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-md">
      <div class="dashboard__sidebar">

        <div class="dashboard_sidebar_list">
        <!-- <div class="sidebar_list_item">
              <a href="{{ route('home.index') }}" class="{{ request()->routeIs('home.index') ? 'active' : '' }} items-center "><i class="flaticon-house mr15"></i>Home</a>
            </div> -->
        @auth
            @role('admin')
            <div class="sidebar_list_item">
              <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'active' : '' }} items-center "><i class="flaticon-house mr15"></i>Users</a>
            </div>
            {{-- <div class="sidebar_list_item">
              <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.index') ? 'active' : '' }} items-center"><i class="flaticon-cash-on-delivery mr15"></i>Roles</a>
            </div> --}}
            <div class="sidebar_list_item">
              <a href="{{ route('videoList') }}" class="{{ request()->routeIs('videoList') ? 'active' : '' }} items-center"><i class="flaticon-cash-on-delivery mr15"></i>Video</a>
            </div>
            @endrole
            @role('so')
            <div class="sidebar_list_item">
              <a href="{{ route('videoList') }}" class="{{ request()->routeIs('videoList') ? 'active' : '' }} items-center"><i class="flaticon-cash-on-delivery mr15"></i>Video</a>
            </div>
            <div class="sidebar_list_item">
              <a href="{{ route('doctors.show') }}" class="items-center">
                <i class="flaticon-house mr15"></i>Doctors
              </a>
            </div>
            @endrole
          
            
            </div>
            </div>
        @endauth

        @auth
          {{auth()->user()->name}}&nbsp;
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth

        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            {{-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> --}}
          </div>
        @endguest

<!--   
  <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-white">Home</a></li>
          @auth
            @role('admin')
            <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
            <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
            <li><a href="{{ route('videoList') }}" class="nav-link px-2 text-white">Video</a></li>
            @endrole
            @role('so')
              <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
              <li><a href="{{ route('videoList') }}" class="nav-link px-2 text-white">Video</a></li>
            @endrole
          
             
          @endauth


        </ul>
  
        
  
        @auth
          {{auth()->user()->name}}&nbsp;
          <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        @endauth
  
        @guest
          <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
            {{-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> --}}
          </div>
        @endguest -->