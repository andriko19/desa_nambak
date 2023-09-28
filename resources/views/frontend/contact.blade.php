@extends('frontend.layouts.master')
@section('title')
  Desa Nambak | {{ $title }}
@endsection
@section('css')

@endsection


@section('content')
  <div id="banner-area" class="banner-area" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/banner/banner1.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">kontak</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kontak</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                      </ol>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end --> 

  <section id="main-container" class="main-container">
    <div class="container">

      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Telepon dan alamat kami</h2>
          <h3 class="section-sub-title">Silahkan kunjungi desa kami</h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
              <i class="fas fa-map-marker-alt mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              @if (count($KontakByAlamat) != 0)
                <h4>{{ $KontakByAlamat[0]->judul}}</h4>
                <p>{{ $KontakByAlamat[0]->isi_kontak}}</p>
              @else
                <h4>Visit Our Office</h4>
                <p>9051 Constra Incorporate, USA</p>
              @endif
            </div>
          </div>
        </div><!-- Col 1 end -->

        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
              <i class="fa fa-envelope mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              @if (count($KontakByEmail) != 0)
                <h4>{{ $KontakByEmail[0]->judul}}</h4>
                <p>{{ $KontakByEmail[0]->isi_kontak}}</p>
              @else
                <h4>Email Us</h4>
                <p>office@Constra.com</p>
              @endif
            </div>
          </div>
        </div><!-- Col 2 end -->

        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
              <i class="fa fa-phone-square mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              @if (count($KontakByTelepon) != 0)
                <h4>{{ $KontakByTelepon[0]->judul}}</h4>
                <p>{{ $KontakByTelepon[0]->isi_kontak}}</p>
              @else
                <h4>Call Us</h4>
                <p>(+9) 847-291-4353</p>
              @endif
            </div>
          </div>
        </div><!-- Col 3 end -->

      </div><!-- 1st row end -->

      <div class="gap-60"></div>

      <div class="google-map">
        <div class="iframe-container"> 
          <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.9069056510143!2d111.44477897421021!3d-8.00853677990638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e797314e94e2e9d%3A0xf3375f2d0bd66cc6!2sKantor%20Desa%20Nambak!5e0!3m2!1sid!2sid!4v1695884363029!5m2!1sid!2sid"></iframe>
        </div>

      <div class="gap-40"></div>

      <!-- Content row -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection