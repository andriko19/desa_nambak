@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('common-components.breadcrumb')
    @slot('pagetitle') Admin Desa @endslot
    @slot('title') Dashboard @endslot
@endcomponent 

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{count($Galeri)}}</span></h4>
                    <p class="text-muted mb-0">Total Galeri</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart"> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{count($Testimoni)}}</span></h4>
                    <p class="text-muted mb-0">Total Testimoni</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart"> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{count($Berita)}}</span></h4>
                    <p class="text-muted mb-0">Total Berita</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="growth-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"> <span data-plugin="counterup">{{count($dataDanInformasi)}}</span></h4>
                    <p class="text-muted mb-0">Total Data Dan Informasi</p>
                </div>
                {{-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                </p> --}}
            </div>
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title mb-4">Total Aduan</h4>
  
                <div class="mt-1">
                    <ul class="list-inline main-chart mb-0">
                        <li class="list-inline-item chart-border-left me-0 border-0">
                            <h3 class="text-primary"><span data-plugin="counterup">{{count($Form)}}</span><span class="text-muted d-inline-block font-size-15 ms-3">Aduan</span></h3>
                        </li>
                       
                    </ul>
                </div>

                <div class="mt-3">
                    <div style="height:25%;" id="app">
                        {{-- {!! $chart->container() !!} --}}
                    </div>
                    {{-- <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div> --}}
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <p class="text-white font-size-18">Desa Nambak <i class="mdi mdi-arrow-right"></i></p>
                        <div class="mt-4">
                            <a href="https://www.google.com/maps/place/Kantor+Desa+Nambak/@-8.0085421,111.4473539,17z/data=!3m1!4b1!4m6!3m5!1s0x2e797314e94e2e9d:0xf3375f2d0bd66cc6!8m2!3d-8.0085421!4d111.4473539!16s%2Fg%2F11cm0bszjk?hl=id&entry=ttu" target="blank" class="btn btn-success waves-effect waves-light">Lokasi Kita Pada Google Maps</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <img src="{{ URL::asset('/assets/images/setup-analytics-amico.svg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4" style="color: aqua" >{!! $TentangDesaByMoto[0]->deskripsi !!}</h4>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end Col -->
</div> <!-- end row-->


@endsection
@section('script')
       {{-- <!-- apexcharts -->
       <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

       <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
       {!! $chart->script() !!} --}}

@endsection