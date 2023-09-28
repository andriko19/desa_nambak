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
                            @if (count($AllDataInformasi) != 0)
                                <h1 class="banner-title">{{ $AllDataInformasi[0]->jenis }}</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Data dan Informasi</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $AllDataInformasi[0]->jenis }}</li>
                                    </ol>
                                </nav>
                            @else
                                <h1 class="banner-title">Data dan Informasi</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Data dan Informasi</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>  
                            @endif
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
                    @if (count($AllDataInformasi) != 0)
                        @foreach ($AllDataInformasi as $key => $data)
                            {{-- <div class="post">
                                <div class="post-media post-image">
                                    <img loading="lazy" src="{{ URL::asset('uploads/dataInformasi/')}}/{{$data->gambar}}" class="img-fluid" alt="post-image">
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
                                            <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}" class="d-inline-block">{{$data->judul}}</a>
                                        </h2>
                                    </div><!-- header end -->
                        
                                    <div class="entry-content">
                                        <p>{!! Str::limit($data->isi_data_informasi, 500) !!}</p>
                                    </div>
                    
                                    <div class="post-footer">
                                        <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}" class="btn btn-primary">Baca Selengkapnya...</a>
                                    </div>
                    
                                </div><!-- post-body end -->
                            </div><!-- 1st post end --> --}}



                            <div class="post">
                                <div class="post-media post-image">
                                    <img loading="lazy" src="{{ URL::asset('uploads/dataInformasi/')}}/{{$data->gambar}}" class="img-fluid" alt="post-image">
                                </div>
                    
                                <div class="post-body">
                                    <div class="entry-header">
                                        <div class="post-meta">
                                            <span class="post-author">
                                                <i class="far fa-user"></i><a href="#"> Admin</a>
                                            </span>
                                            <span class="post-cat">
                                                <i class="far fa-folder-open"></i><a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}"> {{ $title }} </a>
                                            </span>
                                            <span class="post-meta-date"><i class="far fa-calendar"></i> {{ date('d-F-Y',strtotime($data->created_at)) }} </span>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}" class="d-inline-block">{{$data->judul}}</a>
                                        </h2>
                                    </div><!-- header end -->
                        
                                    <div class="entry-content">
                                        {!! Str::limit($data->isi_data_informasi, 500) !!}
                                    </div>
                    
                                    <div class="post-footer">
                                        <a href="{{url('/detail_data_dan_informasi')}}/{{$data->id}}" class="btn btn-primary">Baca Selengkapnya...</a>
                                    </div>
                                </div><!-- post-body end -->
                            </div><!-- 1st post end -->
                        @endforeach
                    @else
                        <div class="post">
                            <div class="post-media post-image">
                                <img loading="lazy" src="{{ URL::asset('assets/frontend/')}}/images/news/news1.jpg" class="img-fluid" alt="post-image">
                            </div>
                
                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta">
                                        <span class="post-author">
                                            <i class="far fa-user"></i><a href="#"> Admin</a>
                                        </span>
                                        <span class="post-cat">
                                            <i class="far fa-folder-open"></i><a href="#"> Data dan Informasi </a>
                                        </span>
                                        <span class="post-meta-date"><i class="far fa-calendar"></i> 08 - Januari - 2023 </span>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="#" class="d-inline-block">Judul Data dan Informasi</a>
                                    </h2>
                                </div><!-- header end -->
                    
                                <div class="entry-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et. Justo nec ultrices dui sapien eget. Aliquet risus feugiat in ante metus dictum at tempor. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Auctor elit sed vulputate mi sit amet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Tortor dignissim convallis aenean et tortor. Vitae tempus quam pellentesque nec nam aliquam sem. Id interdum velit laoreet id donec. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Rutrum quisque non tellus orci ac auctor augue mauris. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam.</p>
                                </div>
                
                                <div class="post-footer">
                                    <a href="#" class="btn btn-primary">Baca Selengkapnya...</a>
                                </div>
                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->
                    @endif
                </div><!-- Content Col end -->
        
                <div class="col-lg-4">
                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Recent Posts</h3>
                            <ul class="list-unstyled">
                                @if (count($ListLiftDataInformasi) != 0)
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
                                @else
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="#"><img loading="lazy" alt="img" src="{{ URL::asset('assets/frontend/')}}/images/news/news1.jpg"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                            <a href="#">Judul Data dan Informasi</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->
                                @endif
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