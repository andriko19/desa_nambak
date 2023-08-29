<!DOCTYPE html>
<html lang="en">

{{-- tag head --}}
@include('frontend.layouts.head')

<body>

  <!-- ======= Header/Topbar ======= -->
  @include('frontend.layouts.topbar')

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="{{ URL::asset('assets/frontend/')}}/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
      <h2>Welcome to <span>HeroBiz</span></h2>
      <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>

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