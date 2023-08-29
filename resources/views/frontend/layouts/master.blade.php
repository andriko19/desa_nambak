<!DOCTYPE html>
<html lang="en">

{{-- tag head --}}
@include('frontend.layouts.head')

<body>

  <!-- ======= Header/Topbar ======= -->
  @include('frontend.layouts.topbar')

  @yield('section-index')

  <main id="main">
 
    {{-- content --}}
    @yield('content')
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.layouts.footer')


  <!-- Vendor JS Files -->
  @include('frontend.layouts.javascript')

</body>

</html>