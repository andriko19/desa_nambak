<div id="top-bar" class="top-bar">
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
                <li> <a href="https://www.google.com/maps/place/Kantor+Desa+Nambak/@-8.0085368,111.444779,17z/data=!3m1!4b1!4m6!3m5!1s0x2e797314e94e2e9d:0xf3375f2d0bd66cc6!8m2!3d-8.0085421!4d111.4473539!16s%2Fg%2F11cm0bszjk?hl=id&entry=ttu" target="blank" > <i class="fas fa-map-marker-alt"></i> <p class="info-text">Desa Nambak, Ponorogo, Jawa Timur</p> </a>
                </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
            <ul class="list-unstyled">
                <li>
                  @if (count($KontakByFacebook) != 0)
                    <a href="{{ $KontakByFacebook[0]->link }}" target="blank" title="{{ $KontakByFacebook[0]->jenis }}">
                      <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                    </a>
                  @endif
                  
                  @if (count($KontakByTwitter) != 0)
                    <a href="{{ $KontakByTwitter[0]->link }}" target="blank" title="{{ $KontakByTwitter[0]->jenis }}">
                      <span class="social-icon"><i class="fab fa-twitter"></i></span>
                    </a>
                  @endif

                  @if (count($KontakByLinkedIn) != 0)
                    <a href="{{ $KontakByLinkedIn[0]->link }}" target="blank" title="{{ $KontakByLinkedIn[0]->jenis }}">
                      <span class="social-icon"><i class="fab fa-linkedin-in"></i></span>
                    </a>
                  @endif

                  @if (count($KontakByTikTok) != 0)
                    <a href="{{ $KontakByTikTok[0]->link }}" target="blank" title="{{ $KontakByTikTok[0]->jenis }}">
                      <span class="social-icon"><i class="fab fa-tiktok"></i></span>
                    </a>
                  @endif
                  
                  @if (count($KontakByInstagram) != 0)
                    <a href="{{ $KontakByInstagram[0]->link }}" target="blank" title="{{ $KontakByInstagram[0]->jenis }}">
                      <span class="social-icon"><i class="fab fa-instagram"></i></span>
                    </a>
                  @endif
                </li>
            </ul>
          </div>
          <!--/ Top social end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="{{url('/')}}">
                  <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/logo.png" alt="Constra" style="width: 60%; height: auto;">
                </a>
            </div><!-- logo end -->
  
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        @if (count($KontakByTelepon) != 0)
                          <p class="info-box-title">{{ $KontakByTelepon[0]->judul}}</p>
                          <p class="info-box-subtitle">{{ $KontakByTelepon[0]->isi_kontak}}</p>
                        @else
                          <p class="info-box-title">Telfon</p>
                          <p class="info-box-subtitle">0823321******</p>
                        @endif
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                        @if (count($KontakByEmail) != 0)
                          <p class="info-box-title">{{ $KontakByEmail[0]->judul}}</p>
                          <p class="info-box-subtitle">{{ $KontakByEmail[0]->isi_kontak}}</p>
                        @else
                          <p class="info-box-title">Email Us</p>
                          <p class="info-box-subtitle">office@Constra.com</p>
                        @endif
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="#site-navigation">Kenali Kami</a>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation" id="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/profil_desa')}}">Profil Desa</a></li>
                          </ul>
                      </li>
              
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data dan Informasi<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/jumlah_remaja_preventif_jenis_kelamin_dan_usia')}}">Jumlah Remaja Preventif, Jenis Kelamin dan Usia</a></li>
                            <li><a href="#">Jumlah Remaja Dispensasi Kawin, Usia, Jenis Kelamin</a></li>
                          </ul>
                      </li>
              
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Informasi Publik<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu">
                              <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Reproduksi</a>
                              <ul class="dropdown-menu">
                                <li><a href="#!">Informasi Reproduksi Perempuan</a></li>
                                <li><a href="#!">Informasi Reproduksi Laki-laki</a></li>
                              </ul>
                            </li>
                            <li class="dropdown-submenu">
                              <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Pencegahan</a>
                              <ul class="dropdown-menu">
                                <li><a href="#!">Pendidikan Seksual</a></li>
                                <li><a href="#!">Komunikasi Terbuka</a></li>
                                <li><a href="#!">Kepercayaan Diri dan Keterampilan Pengambilan Keputusan</a></li>
                                <li><a href="#!">Membangun Nilai Diri Yang Positif</a></li>
                                <li><a href="#!">Menghindari Tekanan Teman Sebaya</a></li>
                                <li><a href="#!">Memahami Konsekuensi dan Resiko Perilaku Seks Bebas</a></li>
                              </ul>
                            </li>
                            <li class="dropdown-submenu">
                              <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Penanganan Remaja Dispensasi Kawin</a>
                              <ul class="dropdown-menu">
                                <li><a href="#!">Pendidikan Seksual</a></li>
                                <li><a href="#!">Konseling Keluarga</a></li>
                                <li><a href="#!">Pemahaman Tanggung Jawab</a></li>
                                <li><a href="#!">Pengemdalian Emosi</a></li>
                                <li><a href="#!">Perlindungan Hukum</a></li>
                              </ul>
                            </li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan Publik<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Layanan Internal</a></li>
                          <li><a href="#">Layanan Konseling</a></li>
                          <li><a href="#">Form Pengaduan Masyarakat</a></li>
                        </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Parenting<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Cara Mendidikan Anak</a></li>
                            <li><a href="#">Mengambangkan Hubungan Yang Sehat Pada Anak</a></li>
                            <li><a href="#">Membangun Komunikasi Yang Baik</a></li>
                            <li><a href="#">Mendorong Perkembangan Anak</a></li>
                            <li><a href="#">Menerapkan Aturan dan Batasan</a></li>
                            <li><a href="#">Perkembangan Anak</a></li>
                          </ul>
                      </li>
              
                      <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">kontak</a></li>
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search">
          <span id="search"><i class="fa fa-search"></i></span>
        </div><!-- Search end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->