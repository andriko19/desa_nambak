@extends('frontend.layouts.master')
@section('title')
  Desa Nambak | {{$title}}
@endsection
@section('css')
    <!-- DataTables -->
    {{-- <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
    <div id="banner-area" class="banner-area" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/banner/banner1.jpg)">
        <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                    <h1 class="banner-title">Profil Desa</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
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
            <div class="row">
                @if (count($TentangDesaByProfil) != 0)
                    <div class="col-lg-6">
                        <h3 class="column-title">{{ $TentangDesaByProfil[0]->judul }}</h3>
                        <p>{!! $TentangDesaByProfil[0]->deskripsi !!}</p>
                    </div><!-- Col end -->
        
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div id="page-slider" class="page-slider small-bg">
                            <div class="item" style="background-image:url({{ URL::asset('uploads/tentangDesa/')}}/{{$TentangDesaByProfil[0]->gambar}})">
                                {{-- <div class="container">
                                    <div class="box-slider-content">
                                        <div class="box-slider-text">
                                            <h2 class="box-slide-title">Leadership</h2>
                                        </div>    
                                    </div>
                                </div> --}}
                            </div><!-- Item 1 end -->
                        </div><!-- Page slider end-->          
                    </div><!-- Col end -->
                @else
                    <div class="col-lg-6">
                        <h3 class="column-title">Desa Nambak</h3>
                        <p>when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.</p>
                        <blockquote><p>Semporibus autem quibusdam et aut officiis debitis aut rerum est aut optio cumque nihil necessitatibus autemn ec tincidunt nunc posuere ut</p></blockquote>
                        <p>He lay on his armour-like  back, and if he lifted. ultrices ultrices sapien, nec tincidunt nunc posuere ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing.</p>
            
                    </div><!-- Col end -->
            
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <div id="page-slider" class="page-slider small-bg">
            
                            <div class="item" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/slider-pages/slide-page1.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Leadership</h2>
                                    </div>    
                                </div>
                            </div>
                            </div><!-- Item 1 end -->
            
                            <div class="item" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/slider-pages/slide-page2.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Relationships</h2>
                                    </div>    
                                </div>
                            </div>
                            </div><!-- Item 1 end -->
            
                            <div class="item" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/slider-pages/slide-page3.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Performance</h2>
                                    </div>    
                                </div>
                            </div>
                            </div><!-- Item 1 end -->
                        </div><!-- Page slider end-->          
                    </div><!-- Col end -->
                @endif
            </div><!-- Content row end -->
        </div><!-- Container end -->
    </section><!-- Main container end -->
  
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
  
    <section id="ts-team" class="ts-team">
        <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Kepala desa</h2>
                <h3 class="section-sub-title">Desa Nambak</h3>
            </div>
        </div><!--/ Title row end -->
    
        <div class="row">
            <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    @if (count($FotoKades) != 0)
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ URL::asset('uploads/fotoKades/')}}/{{$FotoKades[0]->gambar}}" alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">{{ $FotoKades[0]->judul}}</h3>
                                    <p class="ts-designation">Kepala Desa</p>
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->
                    @else
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="{{ URL::asset('assets/frontend/')}}/images/team/team1.jpg" alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">Nats Stenman</h3>
                                    <p class="ts-designation">Chief Operating Officer</p>
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->
                    @endif
                </div><!-- Team slide end -->
            </div>
        </div><!--/ Content row end -->
        </div><!--/ Container end -->
    </section><!--/ Team end -->

@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection