@extends('frontend.layouts.master')
@section('title')
  Desa Nambak | {{ $title }}
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
                  <h1 class="banner-title">Testimoni</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Testimoni</a></li>
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
        <div class="col-md-12">
          <h3 class="column-title">Bagaimana menurut anda tentang desa kami ?</h3>
          <!-- contact form works with formspree.io  -->
          <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
          <form id="add_new_testimoni" class="forms-sample" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="error-container"></div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control form-control-name" name="nama" id="nama" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control form-control-email" name="alamat" id="alamat" placeholder="" type="text"
                    required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Foto</label>
                  <input class="form-control form-control-subject" name="file" id="file" placeholder="" type="file" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Tanggapan anda</label>
              <textarea class="form-control form-control-message" name="tanggapan" id="tanggapan" placeholder="" rows="10"
                required></textarea>
            </div>
            <div class="text-right"><br>
              <button class="btn btn-primary solid blank" type="submit">Kirim Testimoni</button>
            </div>
          </form>
        </div>

      </div><!-- Content row -->
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
@endsection

@section('script')
{{-- <script src="{{ URL::asset('assets/frontend/')}}/js/main.js"></script> --}}
  <script>
    // proses submit add testimoni
    $('#add_new_testimoni').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);

        $.ajax({
            type: 'POST',
            url: "{{ url('testimoni/store') }}",
            data : formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(data){
                if($.isEmptyObject(data.error)){
                    Swal.fire({
                        // icon: 'success',
                        type: "success",
                        title: 'Berhasil!',
                        text: `${data.message}`,
                        // showConfirmButton: false,
                        timer: 3000
                    });
                    window.location.href = "{{url('/')}}";
                }else{
                    printErrorMsgAdd(data.error);
                }
            }
        });
    });
  </script>
@endsection