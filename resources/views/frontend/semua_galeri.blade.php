@extends('frontend.layouts.master')
@section('title')
  Desa Nambak | Semua Galeri
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
                    <h1 class="banner-title">Galeri</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Galeri</a></li>
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
                    @foreach ($AllGaleri as $key => $data)
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
                </div><!-- shuffle end -->
            </div>
    
            {{-- <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="projects.html">View All Projects</a>
                </div>
            </div> --}}
    
        </div><!-- Content row end -->
    
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
    
@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection
