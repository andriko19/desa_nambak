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
                    <h1 class="banner-title">Detail Berita</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
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
        
                <div class="col-lg-8 mb-5 mb-lg-0">
        
                    <div class="post-content post-single">
                        <div class="post-media post-image">
                        <img loading="lazy" src="{{ URL::asset('uploads/berita/')}}/{{$DetailBerita[0]->gambar}}" class="img-fluid" alt="post-image">
                        </div>
            
                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> Admin</a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> {{$title}} </a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> {{ date('d-F-Y',strtotime($DetailBerita[0]->created_at)) }} </span>
                                </div>
                                <h2 class="entry-title">
                                    {{ $DetailBerita[0]->judul }}
                                </h2>
                            </div><!-- header end -->
            
                        <div class="entry-content">
                            {!! $DetailBerita[0]->isi_berita !!}
            
                            {{-- <blockquote>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.
                                    <cite>-Anger Mathe</cite>
                                </p>
                            </blockquote> --}}
                        </div>
            
                        <div class="tags-area d-flex align-items-center justify-content-between">
                            <div class="post-tags">
                            <a href="#">Desa Nambak</a>
                            <a href="#">Berita</a>
                            <a href="#">Detail Berita</a>
                            </div>
                            <div class="share-items">
                            <ul class="post-social-icons list-unstyled">
                                <li class="social-icons-head">Share:</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                            </div>
                        </div>
            
                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                </div><!-- Content Col end -->
        
                <div class="col-lg-4">
        
                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="list-unstyled">
                            @foreach ($Berita as $key => $data)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a href="{{url('/detail_berita')}}/{{$data->id}}"><img loading="lazy" alt="img" src="{{ URL::asset('uploads/berita/')}}/{{$data->gambar}}"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                        <a href="{{url('/detail_berita')}}/{{$data->id}}">{{$data->judul}}</a>
                                        </h4>
                                    </div>
                                </li><!-- 1st post end-->
                            @endforeach
                        </ul>
        
                    </div><!-- Recent post end -->
        
                    <div class="widget widget-tags">
                        <h3 class="widget-title">Tags </h3>
                        <ul class="list-unstyled">
                            @php
                                $listTag = explode(',', $DetailBerita[0]->tag); 
                            @endphp
                            @foreach ( $listTag as $tag)
                                @php
                                    $GetlistTag = DB::select('select * from tbl_tag where id = "'.$tag.'"');
                                    // dump($listTag[0]->judul);
                                @endphp
                                <li><a href="{{$GetlistTag[0]->link}}" target="blank">{{$GetlistTag[0]->judul}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- Tags end -->
        
        
                </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->
        
            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection
