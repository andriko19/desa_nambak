<!DOCTYPE html>
<html lang="en">
 
  {{-- tag head --}}
  @include('frontend.layouts.head')


  <body>
    <div class="body-inner">

      {{-- topbar --}}
      @include('frontend.layouts.topbar')

      {{-- content --}}
      @yield('content')

      <!-- ======= Footer ======= -->
      @include('frontend.layouts.footer')


      <!-- Javascript Files
      ================================================== -->
      @include('frontend.layouts.javascript')
      

    </div><!-- Body inner end -->
  </body>

</html>