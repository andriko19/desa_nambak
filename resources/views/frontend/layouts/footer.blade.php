<footer id="footer" class="footer bg-overlay">
  <div class="footer-main">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
          <h3 class="widget-title">About Us</h3>
          <img loading="lazy" class="" src="{{ URL::asset('assets/frontend/')}}/images/footer-logo.png" alt="Constra" style="width: 60%; height: auto; margin-bottom: 25px">
          @if ($TentangDesaByProfil)
            <p>{!! Str::limit($TentangDesaByProfil[0]->deskripsi, 300) !!}</p>
          @else
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut labore et dolore magna aliqua.</p>
          @endif
          <div class="footer-social">
            <ul>
              <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                    class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
              </li>
              <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                    class="fab fa-instagram"></i></a></li>
              <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
            </ul>
          </div><!-- Footer social end -->
        </div><!-- Col end -->

        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
          <h3 class="widget-title">Prakata Footer</h3>
          <div class="working-hours">
            @if (count($PrakataFooter) != 0 )
              <p>{!! Str::limit($PrakataFooter[0]->prakata, 300) !!}</p>
            @else
              We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our Hotline and Contact form.
            @endif
            {{-- @yield('footer') --}}

            <br> 
            @if (count($HariLayanan) != 0)
              @foreach ($HariLayanan as $key => $data)
                <br>{{ $data->hari }}: <span class="text-right">{{ $data->jam_oprasional }}</span>
              @endforeach
            @else
              <br>Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
              <br> Saturday: <span class="text-right">12:00 - 15:00</span>
              <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
            @endif
          </div>
        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
          <h3 class="widget-title">Layanan</h3>
          <ul class="list-arrow">
            @if (count($Layanan) != 0)
              @foreach ($Layanan as $key => $data)
                <li><a href="#">{{ $data->judul }}</a></li>
              @endforeach
            @else
              <li><a href="#">Pre-Construction</a></li>
              <li><a href="#">General Contracting</a></li>
              <li><a href="#">Construction Management</a></li>
              <li><a href="#">Design and Build</a></li>
              <li><a href="#">Self-Perform Construction</a></li>
            @endif
          </ul>
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->

  <div class="copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="copyright-info text-center">
            <span>Copyright &copy; <script>
                document.write(new Date().getFullYear())
              </script>, Designed &amp; Developed by <a href="http://ict.uwp.ac.id/">ICT UWP</a></span>
          </div>
        </div>

        {{-- <div class="col-md-12">
          <div class="copyright-info text-center">
            <span>Distributed by <a href="https://themewagon.com/">Themewagon</a></span>
          </div>
        </div> --}}

        {{-- <div class="col-md-12">
          <div class="footer-menu text-center">
            <ul class="list-unstyled mb-0">
              <li><a href="about.html">About</a></li>
              <li><a href="team.html">Our people</a></li>
              <li><a href="faq.html">Faq</a></li>
              <li><a href="news-left-sidebar.html">Blog</a></li>
              <li><a href="pricing.html">Pricing</a></li>
            </ul>
          </div>
        </div> --}}
      </div><!-- Row end -->

      <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top">
          <i class="fa fa-angle-double-up"></i>
        </button>
      </div>

    </div><!-- Container end -->
  </div><!-- Copyright end -->
</footer><!-- Footer end -->