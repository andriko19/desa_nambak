@extends('frontend.layouts.master')
@section('title')
  Desa Nambak | {{$title}}
@endsection
@section('css')
    <!-- DataTables -->
    {{-- <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
    <div id="banner-area" class="banner-area" style="background-image:url({{ URL::asset('assets/frontend/')}}/images/banner/tugu-crop.jpg)">
        <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                    <h1 class="banner-title">{{ $DetailDataInformasi[0]->jenis }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data dan Informasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $DetailDataInformasi[0]->jenis }}</li>
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
                        <img loading="lazy" src="{{ URL::asset('uploads/dataInformasi/')}}/{{$DetailDataInformasi[0]->gambar}}" class="img-fluid" alt="post-image">
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
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> {{ date('d-F-Y',strtotime($DetailDataInformasi[0]->created_at)) }} </span>
                                </div>
                                <h2 class="entry-title">
                                    {{ $DetailDataInformasi[0]->judul }}
                                </h2>
                            </div><!-- header end -->
            
                        <div class="entry-content">
                            {!! $DetailDataInformasi[0]->isi_data_informasi !!}
                        </div>
            
                        <div class="tags-area d-flex align-items-center justify-content-between">
                            <div class="post-tags">
                            <a href="#">Desa Nambak</a>
                            <a href="#">Data dan Informasi</a>
                            <a href="#">Detail Data dan Informasi</a>
                            </div>
                            <div class="share-items">
                                <ul class="post-social-icons list-unstyled">
                                    <li class="social-icons-head">Share:</li>
                                    @if (count($KontakByFacebook) != 0)
                                        <li>
                                        <a href="{{ $KontakByFacebook[0]->link }}" target="blank" aria-label="{{ $KontakByFacebook[0]->jenis }}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        </li>
                                    @endif
                                    
                                    @if (count($KontakByTwitter) != 0)
                                        <li>
                                        <a href="{{ $KontakByTwitter[0]->link }}" target="blank" aria-label="{{ $KontakByTwitter[0]->jenis }}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        </li>
                                    @endif

                                    @if (count($KontakByLinkedIn) != 0)
                                        <li>
                                        <a href="{{ $KontakByLinkedIn[0]->link }}" target="blank" aria-label="{{ $KontakByLinkedIn[0]->jenis }}">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        </li>
                                    @endif

                                    @if (count($KontakByTikTok) != 0)
                                        <li>
                                        <a href="{{ $KontakByTikTok[0]->link }}" target="blank" aria-label="{{ $KontakByTikTok[0]->jenis }}">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                        </li>
                                    @endif
                                    
                                    @if (count($KontakByInstagram) != 0)
                                        <li>
                                        <a href="{{ $KontakByInstagram[0]->link }}" target="blank" aria-label="{{ $KontakByInstagram[0]->jenis }}">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        </li>
                                    @endif
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
                            @foreach ($ListLiftDataInformasi as $key => $data)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}"><img loading="lazy" alt="img" src="{{ URL::asset('uploads/dataInformasi/')}}/{{$data->gambar}}"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                        <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}">{{$data->judul}}</a>
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
                                $listTag = explode(',', $DetailDataInformasi[0]->tag); 
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
