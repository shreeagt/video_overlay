<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Optidew">
<meta name="description" content="Optidew">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
<!-- Title -->
<title>Optidew</title>
<!-- Favicon -->
<link href="/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
.ajanta_color {
    /* color: #2e255a; */
    font-weight: bolder;
}


</style>
<body class="text-center">
    <div>
    <main class="form-signin">

        @yield('content')
        

    </main>
    {{-- <p class="empower-text">"An educational initiative by the <span class="ajanta_color">Ajanta Pharma</span> makers of OptiDew"
    </p> --}}
    <p class="empower-text">"An educational initiative by the <span class="ajanta_color"><img src="{{asset('assets/images/ajanta-light.png')}}" class="ajanta_cover" alt="ajanta"></span><span class="br"> makers of <img src="{{asset('/Optidewlogo.png')}}" style="max-width: 150px" alt="ajanta">"</span>
    </p>
</div>
<!-- Wrapper End -->
<script src="{{asset('theme/js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('theme/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('theme/js/popper.min.js')}}"></script>
<script src="{{asset('theme/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('theme/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('theme/js/jquery.mmenu.all.js')}}"></script>
<script src="{{asset('theme/js/ace-responsive-menu.js')}}"></script>
<script src="{{asset('theme/js/snackbar.min.js')}}"></script>
<script src="{{asset('theme/js/simplebar.js')}}"></script>
<script src="{{asset('theme/js/parallax.js')}}"></script>
<script src="{{('theme/js/scrollto.js')}}"></script>
<script src="{{asset('theme/js/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('theme/js/jquery.counterup.js')}}"></script>
<script src="{{asset('theme/js/wow.min.js')}}"></script>
<script src="{{asset('theme/js/progressbar.js')}}"></script>
<script src="{{asset('theme/js/slider.js')}}"></script>
<script src="{{asset('theme/js/timepicker.js')}}"></script>
<script src="{{asset('theme/js/scrollbalance.js')}}"></script>
<!-- Custom script for all pages --> 
<script src="{{asset('theme/js/script.js')}}"></script>
</body>
</html>
