<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo.ico')}}"> --}}

  <link href="{{ URL::asset('assets/frontend/')}}/img/favicon.png" rel="icon">
  <link href="{{ URL::asset('assets/frontend/')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('assets/frontend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::asset('assets/frontend/')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ URL::asset('assets/frontend/')}}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ URL::asset('assets/frontend/')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ URL::asset('assets/frontend/')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{ URL::asset('assets/frontend/')}}/css/variables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('assets/frontend/')}}/css/main.css" rel="stylesheet">

  @yield('css')
</head>