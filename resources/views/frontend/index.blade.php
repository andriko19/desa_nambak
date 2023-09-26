@extends('frontend.layouts.master')
@section('title')
  @lang($title)
@endsection
@section('css')
    <!-- DataTables -->
    {{-- <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
  <div class="banner-carousel banner-carousel-1 mb-0">
    @if ($BannerByUcapan)
        <div class="banner-carousel-item" style="background-image:url({{ URL::asset('uploads/banner/')}}/{{$BannerByUcapan[0]->gambar}})">
            <div class="slider-content">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft" style="color:#ffc107;">{{$BannerByUcapan[0]->judul}}</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight" style="color:#ffc107;">{!!$BannerByUcapan[0]->deskripsi!!}</h3>
                        {{-- <p data-animation-in="slideInLeft" data-duration-in="1.2">
                            <a href="services.html" class="slider btn btn-primary">Our Services</a>
                            <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                        </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($BannerByHighlight as $key => $data)
        <div class="banner-carousel-item" style="background-image:url({{ URL::asset('uploads/banner/')}}/{{$data->gambar}})">
            <div class="slider-content text-left">
                <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        {{-- <h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2> --}}
                        <h3 class="slide-title" data-animation-in="fadeIn" style="color:#ffc107;">{{$data->judul}}</h3>
                        <h3 class="slide-sub-title" data-animation-in="slideInLeft" style="color:#ffc107;">{!! $data->deskripsi !!}</h3>
                        {{-- <p data-animation-in="slideInRight">
                            <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                        </p> --}}
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="banner-carousel-item" style="background-image:url({{ URL::asset('assets/frontend')}}/images/slider-main/bg1.png)">
            <div class="slider-content">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft" style="color:#ffc107;">Selamat Datang</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight" style="color:#ffc107;">Desa Nambak</h3>
                        {{-- <p data-animation-in="slideInLeft" data-duration-in="1.2">
                            <a href="services.html" class="slider btn btn-primary">Our Services</a>
                            <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                        </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

  </div>
  @php
    //   var_dump($TentangDesaByMoto);
    //   die;
  @endphp
  <section class="call-to-action-box no-padding">
    @if (count($TentangDesaByMoto) != 0)
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                        <h3 class="action-title"> <p style="font-size: 40%"> {!! $TentangDesaByMoto[0]->deskripsi !!} </p> </h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                        <a class="btn btn-dark" href="#ts-features">Profil Singkat</a>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    @else
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                        <h3 class="action-title"> <p style="font-size: 100%"> Isi moto desa </p> </h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                        <a class="btn btn-dark" href="#ts-features">Profil Singkat</a>
                        </div>
                    </div><!-- col end -->
                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    @endif
  </section><!-- Action end -->

  <section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="ts-intro">
                <h2 class="into-title">Profil Singkat</h2>
                <h3 class="into-sub-title">Desa Nambak</h3>
                @if (count($TentangDesaByProfil) != 0)
                    <p>{!! Str::limit($TentangDesaByProfil[0]->deskripsi, 500) !!}</p>
                @else
                    <p>Isi deskripsi atau sejarah dari desa.</p>
                @endif

            </div><!-- Intro box end -->

            <div class="gap-20"></div>

            <div class="row">
                @if (count($TentangDesaByKeunggulan) != 0)
                    @foreach ($TentangDesaByKeunggulan as $key => $data)
                        <div class="col-md-12">
                            <div class="ts-service-box">
                                <span class="ts-service-icon">
                                    <i class="fas fa-trophy"></i>
                                </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">{{$data->judul}}</h3>
                                    <p>{!! Str::limit($data->deskripsi, 500) !!}</p>
                                </div>
                            </div><!-- Service 1 end -->
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="ts-service-box">
                            <span class="ts-service-icon">
                                <i class="fas fa-trophy"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h3 class="service-box-title">Keunggulan 1</h3>
                                <p>Ini Keunggulan desa ke 1</p>
                            </div>
                        </div><!-- Service 1 end -->
                    </div>
                    <div class="col-md-12">
                        <div class="ts-service-box">
                            <span class="ts-service-icon">
                                <i class="fas fa-trophy"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h3 class="service-box-title">Keunggulan 2</h3>
                                <p>Ini Keunggulan desa ke 2</p>
                            </div>
                        </div><!-- Service 1 end -->
                    </div>
                    <div class="col-md-12">
                        <div class="ts-service-box">
                            <span class="ts-service-icon">
                                <i class="fas fa-trophy"></i>
                            </span>
                            <div class="ts-service-box-content">
                                <h3 class="service-box-title">Keunggulan 3</h3>
                                <p>Ini Keunggulan desa ke 3</p>
                            </div>
                        </div><!-- Service 1 end -->
                    </div>
                @endif

            </div><!-- Content row 1 end -->
          </div><!-- Col end -->

          <div class="col-lg-6 mt-4 mt-lg-0">
            <h3 class="into-sub-title">Pertanyaan Umum</h3>
            @if (count($TentangDesaByPrakataPertanyaan) != 0)
                <p>{!! $TentangDesaByPrakataPertanyaan[0]->prakata !!}</p>
            @else
                <p>prakata singkat untuk pembuka pertanyaan yang sering ditanyakan oleh warga.</p>
            @endif

            <div class="accordion accordion-group" id="our-values-accordion">
                @if (count($TentangDesaByPertanyaanUmum) != 0)
                    @foreach ($TentangDesaByPertanyaanUmum as $key => $data)
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="heading{{$key}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$key}}"  aria-expanded="{{$key==0 ? "true" : "false"}}" aria-controls="collapse{{$key}}">
                                    {!! $data->pertanyaan !!}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$key}}" class="collapse {{$key==0 ? "show" : ""}}" aria-labelledby="heading{{$key}}" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    {!! $data->jawaban !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="heading1">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1"  aria-expanded="true" aria-controls="collapse1">
                                    pertanyaan 1 ?
                                </button>
                            </h2>
                        </div>

                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#our-values-accordion">
                            <div class="card-body">
                                Jawaban untuk pertanyaan 1.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0 bg-transparent" id="heading2">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2"  aria-expanded="false" aria-controls="collapse2">
                                    pertanyaan 2 ?
                                </button>
                            </h2>
                        </div>

                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#our-values-accordion">
                            <div class="card-body">
                                Jawaban untuk pertanyaan 2.
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!--/ Accordion end -->
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- Feature are end -->

  <section id="facts" class="facts-area dark-bg">
    <div class="container">
      <div class="facts-wrapper">
          <div class="row">
            <div class="col-md-3 col-sm-6 ts-facts">
                <div class="ts-facts-img">
                  <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/fact1.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num"><span class="counterUp" data-count="10">0</span></h2>
                  <h3 class="ts-facts-title">Total Pengunjung hari ini</h3>
                </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                <div class="ts-facts-img">
                  <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/fact2.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num"><span class="counterUp" data-count="20">0</span></h2>
                  <h3 class="ts-facts-title">Total Pengunjung bulan lalu</h3>
                </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                  <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/fact3.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num"><span class="counterUp" data-count="30">0</span></h2>
                  <h3 class="ts-facts-title">Total Pengunjung tahun lalu</h3>
                </div>
            </div><!-- Col end -->

            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                  <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/fact4.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                  <h2 class="ts-facts-num"><span class="counterUp" data-count="40">0</span></h2>
                  <h3 class="ts-facts-title">Total Semua Pengunjung</h3>
                </div>
            </div><!-- Col end -->

          </div> <!-- Facts end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Facts end -->

  <section id="ts-service-area" class="ts-service-area pb-0">
    <div class="container">
      <div class="row text-center">
          <div class="col-12">
            <h2 class="section-title">Layanan Desa</h2>
            <h3 class="section-sub-title">Layanan yang tersedia</h3>
          </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
            <div class="col-lg-4">
                @if (count($Layanan) != 0)
                    @if (count($Layanan) >= 1)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon1.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">{{ $Layanan[0]->judul }}</a></h3>
                                <p>{!! $Layanan[0]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 1 end -->
                    @endif

                    @if (count($Layanan) >= 3)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon2.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">{{ $Layanan[2]->judul }}</a></h3>
                                <p>{!! $Layanan[2]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 3 end -->
                    @endif

                    @if (count($Layanan) >= 5)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon3.png"  alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">{{ $Layanan[4]->judul }}</a></h3>
                                <p>{!! $Layanan[4]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 5 end -->
                    @endif
                @else
                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon1.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 1</a></h3>
                            <p>Deskripsi Layanan 1</p>
                        </div>
                    </div><!-- Layanan 1 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon2.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 3</a></h3>
                            <p>Deskripsi Layanan 3</p>
                        </div>
                    </div><!-- Layanan 3 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon3.png"  alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 5</a></h3>
                            <p>Deskripsi Layanan 5</p>
                        </div>
                    </div><!-- Layanan 5 end -->
                @endif
            </div><!-- Col end -->

            @if (count($FotoKades) != 0)
                <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid" src="{{ URL::asset('uploads/fotoKades/')}}/{{$FotoKades[0]->gambar}}" alt="service-avater-image">
                </div><!-- Col end -->
            @else
                <div class="col-lg-4 text-center">
                    <img loading="lazy" class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/services/service-center.jpg" alt="service-avater-image">
                </div><!-- Col end -->
            @endif


            <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                @if (count($Layanan) != 0)
                    @if (count($Layanan) >= 2)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon4.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">{{ $Layanan[1]->judul }}</a></h3>
                                <p>{!! $Layanan[1]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 2 end -->
                    @endif

                    @if (count($Layanan) >= 4)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon5.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">{{ $Layanan[3]->judul }}</a></h3>
                                <p>{!! $Layanan[3]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 4 end -->
                    @endif

                    @if (count($Layanan) >= 6)
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon6.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">{{ $Layanan[5]->judul }}</a></h3>
                            <p>{!! $Layanan[5]->deskripsi !!}</p>
                            </div>
                        </div><!-- Layanan 6 end -->
                    @endif
                @else
                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon4.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 2</a></h3>
                            <p>Deskripsi Layanan 2</p>
                        </div>
                    </div><!-- Layanan 2 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon5.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 4</a></h3>
                            <p>Deskripsi Layanan 4</p>
                        </div>
                    </div><!-- Layanan 4 end -->

                    <div class="ts-service-box d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/icon-image/service-icon6.png" alt="service-icon">
                        </div>
                        <div class="ts-service-box-info">
                            <h3 class="service-box-title"><a href="#">Layanan 6</a></h3>
                            <p>Deskripsi Layanan 6</p>
                        </div>
                    </div><!-- Layanan 6 end -->
                @endif
            </div><!-- Col end -->
      </div><!-- Content row end -->

    </div>
    <!--/ Container end -->
  </section><!-- Service end -->

  <section id="project-area" class="project-area solid-bg">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Galeri</h2>
          <h3 class="section-sub-title">Dokumentasi Desa</h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <div class="col-12">
          <div class="shuffle-btn-group">
            <label class="active" for="all">
              <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">semua
            </label>
            <label for="Didalam Desa">
              <input type="radio" name="shuffle-filter" id="Didalam Desa" value="Didalam Desa">Didalam desa
            </label>
            <label for="Diluar Desa">
              <input type="radio" name="shuffle-filter" id="Diluar Desa" value="Diluar Desa">Diluar desa
            </label>
          </div><!-- project filter end -->


          <div class="row shuffle-wrapper">
            <div class="col-1 shuffle-sizer"></div>
            @if (count($Galeri) != 0)
                @foreach ($Galeri as $key => $data)
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;{{$data->jenis}}&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ URL::asset('uploads/galeri/')}}/{{$data->gambar}}" aria-label="project-img">
                                <img class="img-fluid" src="{{ URL::asset('uploads/galeri/')}}/{{$data->gambar}}" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a>{{$data->judul}}</a>
                                    </h3>
                                    <p class="project-cat">Dokumentasi, Desa</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 1 end -->
                @endforeach
            @else
                <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;Didalam Desa&quot;]">
                    <div class="project-img-container">
                        <a class="gallery-popup" href="{{ URL::asset('assets/frontend/')}}/images/projects/project1.jpg" aria-label="project-img">
                            <img class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/projects/project1.jpg" alt="project-img">
                            <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="project-item-info">
                            <div class="project-item-info-content">
                                <h3 class="project-item-title">
                                    <a>{{$data->judul}}</a>
                                </h3>
                                <p class="project-cat">Dokumentasi, Desa</p>
                            </div>
                        </div>
                    </div>
                </div><!-- shuffle item 1 end -->

                <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;Diluar Desa&quot;]">
                    <div class="project-img-container">
                        <a class="gallery-popup" href="{{ URL::asset('assets/frontend/')}}/images/projects/project2.jpg" aria-label="project-img">
                            <img class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/projects/project2.jpg" alt="project-img">
                            <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="project-item-info">
                            <div class="project-item-info-content">
                                <h3 class="project-item-title">
                                    <a>{{$data->judul}}</a>
                                </h3>
                                <p class="project-cat">Dokumentasi, Desa</p>
                            </div>
                        </div>
                    </div>
                </div><!-- shuffle item 1 end -->
            @endif
          </div><!-- shuffle end -->
        </div>

        <div class="col-12">
          <div class="general-btn text-center">
            <a class="btn btn-primary" href="{{url('/semua_galeri')}}">Lihat semua galeri</a>
          </div>
        </div>

      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Project area end -->

  <section class="content">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <h3 class="column-title">Testimoni Pengunjung</h3>

            <div id="testimonial-slide" class="testimonial-slide">
                @if (count($Testimoni) != 0)
                    @foreach ($Testimoni as $key => $data)
                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    {!! $data->tanggapan!!}
                                </span>

                                <div class="quote-item-footer">
                                    @if ($data->foto != null)
                                    <img loading="lazy" class="testimonial-thumb" src="{{ URL::asset('uploads/testimoni/')}}/{{ $data->foto }}" alt="testimonial">
                                    @else
                                    <img loading="lazy" class="testimonial-thumb" src="{{ URL::asset('assets/frontend/')}}/images/clients/testimonial1.png" alt="testimonial">
                                    @endif
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">{{ $data->nama }}</h3>
                                        <span class="quote-subtext">{{ $data->alamat }}</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 1 end -->
                    @endforeach
                @else
                    <div class="item">
                        <div class="quote-item">
                            <span class="quote-text">
                                Testimoni ke 1
                            </span>

                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb" src="{{ URL::asset('assets/frontend/')}}/images/team/team1.jpg" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">Alexander</h3>
                                    <span class="quote-subtext">USA</span>
                                </div>
                            </div>
                        </div><!-- Quote item end -->
                    </div>
                    <div class="item">
                        <div class="quote-item">
                            <span class="quote-text">
                                Testimoni ke 2
                            </span>

                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb" src="{{ URL::asset('assets/frontend/')}}/images/team/team2.jpg" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">Selena</h3>
                                    <span class="quote-subtext">USA</span>
                                </div>
                            </div>
                        </div><!-- Quote item end -->
                    </div>
                @endif

            </div>
            <!--/ Testimonial carousel end-->
          </div><!-- Col end -->

          <div class="col-lg-6 mt-5 mt-lg-0">

            <h3 class="column-title">Kerjasama dengan</h3>

            <div class="row all-clients">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                      <a href="https://uwp.ac.id/" target="blank"><img loading="lazy" class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/clients/uwp-ok.jpg" alt="clients-logo" /></a>
                  </figure>
                </div><!-- Client 1 end -->
            </div><!-- Clients row end -->

          </div><!-- Col end -->

      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Content end -->

  <section class="subscribe no-padding">
    <div class="container">
      <div class="row">
          <div class="col-lg-4">
            <div class="subscribe-call-to-acton">
                <h3>Telfon</h3>
                <h4>0823988******</h4>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-8">
            <div class="ts-newsletter row align-items-center">
                <div class="col-md-8 newsletter-introtext">
                  <h4 class="text-white mb-0">Moto Desa</h4>
                  @if (count($TentangDesaByMoto) != 0)
                    <p class="text-white">{!! $TentangDesaByMoto[0]->deskripsi !!}</p>
                  @else
                    <p class="text-white">Moto desa</p>
                  @endif
                </div>

                <div class="col-md-4 newsletter-form">
                  <a class="btn btn-primary" href="{{url('/testimoni')}}">Bagaimana menurut anda tentang desa kami</a>
                </div>
            </div><!-- Newsletter end -->
          </div><!-- Col end -->

      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section><!--/ subscribe end -->

  <section id="news" class="news">
    <div class="container">
      <div class="row text-center">
          <div class="col-12">
            <h2 class="section-title">Berita</h2>
            <h3 class="section-sub-title">Kumpulan berita terkini</h3>
          </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="news-single.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/news/news1.jpg" alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">We Just Completes $17.6 million Medical Clinic in Mid-Missouri</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> July 20, 2017
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 1st post col end -->

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="news-single.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/news/news2.jpg" alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">Thandler Airport Water Reclamation Facility Expansion Project Named</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> June 17, 2017
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 2nd post col end -->

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                  <a href="news-single.html" class="latest-post-img">
                      <img loading="lazy" class="img-fluid" src="{{ URL::asset('assets/frontend/')}}/images/news/news3.jpg" alt="img">
                  </a>
                </div>
                <div class="post-body">
                  <h4 class="post-title">
                      <a href="news-single.html" class="d-inline-block">Silicon Bench and Cornike Begin Construction Solar Facilities</a>
                  </h4>
                  <div class="latest-post-meta">
                      <span class="post-item-date">
                        <i class="fa fa-clock-o"></i> Aug 13, 2017
                      </span>
                  </div>
                </div>
            </div><!-- Latest post end -->
          </div><!-- 3rd post col end -->
      </div>
      <!--/ Content row end -->

      <div class="general-btn text-center mt-4">
          <a class="btn btn-primary" href="{{url('/semua_berita')}}">Lihat Semua Berita</a>
      </div>

    </div>
    <!--/ Container end -->
  </section>
  <!--/ News end -->
@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection
