<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title') - {{ config('app.name', 'Arbor.ru') }}</title>
	<meta name="description" content="Распиловка и кромление" />
	<meta name="keywords" content="распиловка, кромление, ЛДСП" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}" />
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}" />
	<link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />
	<link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5" />
	<meta name="msapplication-TileColor" content="#da532c" />
	<meta name="theme-color" content="#ffffff" />
	<!-- open graph -->
	<meta name="og:title" content="Главная - Arbor.ru" />
	<meta property="og:image" content="{{ asset('images/img/logo.svg') }}" />
	<meta name="og:description" content="Распиловка и кромление" />
	<meta name="og:url" content="arbor.ru" />
	<meta name="og:site_name" content="«Arbor.ru» – Официальный сайт" />
	<meta name="og:locale" content="ru_RU" />
	<meta name="og:type" content="website" />
	<!-- styles -->
	<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
	<!-- header -->
	@include('User.Components.header')

	<!-- mobile header -->
	@include('User.Components.mobile_header')

	<!-- mobile menu -->
	@include('User.Components.mobile_menu')

	<!-- mobile menu 2 -->
	@include('User.Components.mobile_menu2')

	<main>
		@yield('content')
	</main>

	<!-- FOOTER -->
	@include('User.Components.footer')

	<!-- CALLBACK modal -->
	@include('User.Components.Modals.callback_modal')

	<!-- Modal order -->
	@include('User.Components.Modals.order_modal')

	<!-- QR Modal -->
	@include('User.Components.Modals.qr_modal')

	<script src="{{ asset('js/jquery(v.3.5.1).min.js') }}"></script>
	<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script src="{{ asset('js/my-swipers.js') }}"></script>

</body>

</html>