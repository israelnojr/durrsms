<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> {{ config('app.name')}} | Saturday free fixed matches</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('frontend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

   <!-- Bootstrap CSS File -->
   <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/message.css')}}" rel="stylesheet">
  
</head>

<body>
  @include('layouts.frontend.partial.header')
  @include('layouts.frontend.partial.hero')
  <main>
    @yield('content')
  </main>
  @include('layouts.frontend.partial.footer')
 <div>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
 </div>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('frontend/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/wow/wow.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ asset('frontend/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/magnific-popup/magnific-popup.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('frontend/js/main.js')}}"></script>
  <script src="{{asset('/js/message.js')}}"></script>
</body>
</html>