<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/img/favicon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('front/img/favicon.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('front/img/favicon.png')}}" sizes="16x16" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DurrSms') }} | #1 Sms deliverying platform</title>
      <meta name="author" content="Iloba Israel">
      <!-- Bootstrap core CSS-->
      <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="{{ asset('front/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="{{ asset('front/css/osahan.css')}}" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{ asset('front/vendor/owl-carousel/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{ asset('front/vendor/owl-carousel/owl.theme.css')}}">
   </head>
   <body id="page-top" class="login-main-body">
    
         @if(Auth::check())
            @include('layouts.front.inc.header')
            <div id="wrapper">
                  @include('layouts.front.inc.sidebar')
                  @yield('content')
            </div>
            @include('layouts.front.inc.footer')
            @else
            <div id="wrapper">
               @yield('content')
            </div>
         @endif
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary"  href="{{ route('logout')}}" onclick="event.preventDefault();
					      document.getElementById('logout-form').submit();">						
                     {{ __('Logout')}}
                  </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('front/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{ asset('front/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Owl Carousel -->
      <script src="{{ asset('front/vendor/owl-carousel/owl.carousel.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{ asset('front/js/custom.js')}}"></script>
   </body>
</html>