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
                        <h1 class="banner-title">Berita</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Berita</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Semua Berita</li>
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
                    @foreach ($AllBerita as $key => $data)
                        <div class="post">
                            <div class="post-media post-image">
                                <img loading="lazy" src="{{ URL::asset('uploads/berita/')}}/{{$data->gambar}}" class="img-fluid" alt="post-image">
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
                                        <span class="post-meta-date"><i class="far fa-calendar"></i> {{ date('d-F-Y',strtotime($data->created_at)) }} </span>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{url('/detail_berita')}}/{{$data->id}}" class="d-inline-block">{{$data->judul}}</a>
                                    </h2>
                                </div><!-- header end -->
                    
                                <div class="entry-content">
                                    <p>{!! Str::limit($data->isi_berita, 500) !!}</p>
                                </div>
                
                                <div class="post-footer">
                                    <a href="{{url('/detail_berita')}}/{{$data->id}}" class="btn btn-primary">Baca Selengkapnya...</a>
                                </div>
                
                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->
                    @endforeach
        
                    {{-- <nav class="paging" aria-label="Page navigation example">
                        <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav> --}}
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
                                @foreach ($AllTag as $key => $data)
                                    <li><a href="{{$data->link}}" target="blank">{{$data->judul}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- Tags end -->
            
            
                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->
        
            </div><!-- Main row end -->
    
        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
@endsection