<nav class="navbar navbar-expand navbar-light static-top osahan-nav sticky-top">
      &nbsp;&nbsp; 
      <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
      </button> &nbsp;&nbsp;
      <a class="navbar-brand mr-1" href="{{('/')}}"><img class="img-fluid" alt="" src="{{ asset('jboximage/logo-small.png')}}"></a>
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
         
      </form>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
         
         <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
            <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <img alt="Avatar" src="{{ asset('front/img/user.png')}}"> -->
            {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
               <a class="dropdown-item" href="#"><i class="fas fa-fw fa-wallet"></i> &nbsp; Subscriptions</a>
               <a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
            </div>
         </li>
      </ul>
      @include('layouts.front.inc.message')
</nav>