<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0"> --}}
  {{-- <meta property="og:url" content="https://nothing.com"> --}}
  <meta property="og:type" content="website">
  <meta property="og:title" content="Desa Nambak">
  <meta property="og:description" content="Jalan Pemuda No. 27, Nambak, Bungkal, Nambak Tengah, Nambak, Ponorogo, Kabupaten Ponorogo, Jawa Timur 63462">
  <meta property="og:image" content="{{ URL::asset('assets/frontend/')}}/images/logo.png">

  <!-- Favicon
  ================================================== -->
  <link rel="icon" type="image/png" href="{{ URL::asset('assets/frontend/')}}/images/favicon.png">

  <!-- CSS
  ================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/slick/slick.css">
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ URL::asset('assets/frontend/')}}/css/style.css">
  {{-- Sweet Alert --}}
  <link rel="stylesheet" href="{{ url('/') }}/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <script src="{{ url('/') }}/sweetalert2/sweetalert2.min.js"></script>
  
  <style>
    .iframe-container {
      position: relative;
      width: 100%;
      overflow: hidden;
      padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }
    
    .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>

</head>