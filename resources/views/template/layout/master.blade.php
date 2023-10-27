<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Oxfam</title>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/fav-icon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/fav-icon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/fav-icon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/fav-icon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/fav-icon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/fav-icon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/fav-icon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/fav-icon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav-icon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/fav-icon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav-icon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/fav-icon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/fav-icon/favicon-16x16.png')}}">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css')}}" media="screen">

	<!-- Vendor css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/settings.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/navigation.css')}}">

	<!-- Important Owl stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.css')}}">

	<!-- Fancy box css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/fancy-box/jquery.fancybox.css')}}">

	<!-- ui css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-css/jquery-ui.css')}}">
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}">

	<!-- Fonts -->
	<link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic')}}" rel='stylesheet' type='text/css'>
	<link href="{{ asset('https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic')}}" rel='stylesheet' type='text/css'>

	<!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive/responsive.css')}}">


	<!--[if lt IE 9]>
   		<script src="js/html5shiv.js"></script>
	<![endif]-->



</head>
<body class="home layout_changer">

	@include('template.layout.top_header')
	@include('template.layout.bot_header')
	@include('template.layout.menu')

	
	@include('template.layout.header')
  <!-- Js File -->
	@yield('content')
   <!-- j Query -->
   @include('template.layout.footer')
   <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.js')}}"></script>

   <!-- Bootstrap JS -->
   <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
   <!-- revolution -->
   <script src="{{ asset('js/revolution/jquery.themepunch.tools.min.js')}}"></script>
   <script src="{{ asset('js/revolution/jquery.themepunch.revolution.min.js')}}"></script>
   <script type="text/javascript" src="{{ asset('js/revolution/revolution.extension.slideanims.min.js')}}"></script>
   <script type="text/javascript" src="{{ asset('js/revolution/revolution.extension.layeranimation.min.js')}}"></script>
   <script type="text/javascript" src="{{ asset('js/revolution/revolution.extension.navigation.min.js')}}"></script>
   <script type="text/javascript" src="{{ asset('js/revolution/revolution.extension.kenburn.min.js')}}"></script>
   <script type="text/javascript" src="{{ asset('js/revolution/revolution.extension.actions.min.js')}}"></script>


   <!-- mix it up -->
   <script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js')}}"></script>
   <!-- Owl carousel -->
   <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
   <!-- google map -->
   <script src="{{ asset('http://maps.google.com/maps/api/js')}}"></script> <!-- Gmap Helper -->
   <script src="{{ asset('js/gmap.js')}}"></script> <!-- gmap JS -->
   <!-- fancy box -->
   <script src="{{ asset('js/jquery.fancybox.pack.js')}}"></script>

   <script type="text/javascript" src="{{ asset('js/validate.js')}}"></script>

   <!-- ui js -->
   <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
   <!-- main js -->
   <script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
</body>
</html>