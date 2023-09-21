@extends('layouts.master')
@section('title')
    @lang($title)
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- select2 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/libs/select2/select2.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Admin
        @endslot
        @slot('title')
            @lang($pages)
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$idmodal}}">
                            <i class="fas fa-calendar-plus"> </i> Tambah @lang($title) Baru
                        </button>
                    @endcan

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Judul</th>
                                    <th>Isi Kontak</th>
                                    <th>Link Maps</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kontak as $key => $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->jenis }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->isi_kontak }}</td>
                                        <td> <a href="{{ $data->link }}" target="blank">{{ $data->link }}</a></td>
                                        <td>
                                            {{-- <a class="btn btn-primary" href="#">Edit</a>
                                            <a class="btn btn-danger" href="#">Hapus</a> --}}
                                            <button type="button" class="btn btn-primary" onclick="update({{ $data->id }})" > Edit
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="destroy({{ $data->id }})" >
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
<!-- Button trigger modal -->


<!-- Modal Add Data-->
<div class="modal fade" id="modal{{$idmodal}}" tabindex="-1" aria-labelledby="modal{{$idmodal}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="add_new_{{$idmodal}}" class="forms-sample" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modal{{$idmodal}}Label">Tambah {{$title}} Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg-add" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Jenis</label>
                        <select class="form-select jenis" name="jenis" id="jenis">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option value="0" selected> --Pilih Jenis {{$title}}-- </option>
                            <option value="Alamat">Alamat</option>
                            <option value="Email">Email</option>
                            <option value="Telepon">Telepon</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Maps">Maps</option>
                            {{-- @endforeach  --}} 
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 div_isi_kontak">
                        <label for="isi_kontak">Isi Kontak</label>
                        <input type="text" class="form-control" id="isi_kontak" name="isi_kontak" placeholder="Contoh : 082387337**** atau Jl. Jhosuman RT/RW 008/008">
                    </div>
                    <div class="form-group div_link">
                        <label for="link">Link Sosmed / Maps</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Contoh : copy dari google">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="modalEdit{{$idmodal}}" tabindex="-1" aria-labelledby="modal{{$idmodal}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="edit_{{$idmodal}}" class="forms-sample" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modal{{$idmodal}}Label">Edit {{$title}} Lama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg-edit" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    <div class="form-group mb-4">
                        <label for="edit_jenis">Jenis</label>
                        <input type="text" class="form-control" id="edit_jenis" name="edit_jenis" placeholder="jenis {{$title}}" readonly>
                    </div>
                    <div class="form-group mb-4">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="edit_judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 edit_div_isi_kontak">
                        <label for="edit_isi_kontak">Isi Kontak</label>
                        <input type="text" class="form-control" id="edit_isi_kontak" name="edit_isi_kontak" placeholder="Contoh : 082387337**** atau Jl. Jhosuman RT/RW 008/008">
                    </div>
                    <div class="form-group edit_div_link">
                        <label for="edit_link">Link Sosmed / Maps</label>
                        <input type="text" class="form-control" id="edit_link" name="edit_link" placeholder="Contoh : copy dari google">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    {{-- ckEditor --}}
    <script src="{{ url('/') }}/ckeditor/ckeditor.js"></script>
    {{-- select2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            document.getElementsByClassName('div_isi_kontak')[0].style.display = "none";
            document.getElementsByClassName('div_link')[0].style.display = "none";
            $('.js-select2-multi').select2({
                // placeholder : "--Pilih Siapa Yang Ingin di Tag--",
                // placeholder: "--Pilih Siapa Yang Ingin di Tag--",
                // allowClear: true,
            });
        });

        // // ckeditor_add
        // var prakata = document.getElementById("prakata");
        //     CKEDITOR.replace(prakata,{
        //     language:'en-gb'
        // });
        // CKEDITOR.config.allowedContent = true;

        // //ckeditor_edit
        // var prakata = document.getElementById("edit_prakata");
        //     CKEDITOR.replace(prakata,{
        //     language:'en-gb'
        // });
        // CKEDITOR.config.allowedContent = true;
            
        // change jenis kontak
        $('.jenis').change(function() {
            let jenis_val = $('.jenis').val();
            // console.log(jenis_val);
            if (jenis_val == "Alamat") {
                document.getElementsByClassName('div_isi_kontak')[0].style.display = "block";
                document.getElementsByClassName('div_link')[0].style.display = "none";
            } else if (jenis_val == "Email") {
                document.getElementsByClassName('div_isi_kontak')[0].style.display = "block";
                document.getElementsByClassName('div_link')[0].style.display = "none";
            } else if (jenis_val == "Telepon") {
                document.getElementsByClassName('div_isi_kontak')[0].style.display = "block";
                document.getElementsByClassName('div_link')[0].style.display = "none";
            } else if (jenis_val == "Instagram") {
                document.getElementsByClassName('div_isi_kontak')[0].style.display = "none";
                document.getElementsByClassName('div_link')[0].style.display = "block";
            } else if (jenis_val == "Maps") {
                document.getElementsByClassName('div_isi_kontak')[0].style.display = "none";
                document.getElementsByClassName('div_link')[0].style.display = "block";
            }
        });

        // proses submit add kontak
        $('#add_new_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // formData.append('prakata', CKEDITOR.instances['prakata'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('kontak/store') }}",
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
                        window.location.href = "{{url('admin/kontak')}}";
                    }else{
                        printErrorMsgAdd(data.error);
                    }
                }
            });
        });

        // show edit kontak
        function update(id) {
            $.ajax({
                url: "{{ url('kontak/show') }}/" + id,
                type: "get",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#edit_id').val(response.data.id);
                    $('#edit_jenis').val(response.data.jenis);
                    $('#edit_judul').val(response.data.judul);
                    $('#edit_isi_kontak').val(response.data.isi_kontak);
                    $('#edit_link').val(response.data.link);

                    if (response.data.jenis == "Alamat") {
                        document.getElementsByClassName('edit_div_isi_kontak')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_link')[0].style.display = "none";
                    } else if (response.data.jenis == "Email") {
                        document.getElementsByClassName('edit_div_isi_kontak')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_link')[0].style.display = "none";
                    } else if (response.data.jenis == "Telepon") {
                        document.getElementsByClassName('edit_div_isi_kontak')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_link')[0].style.display = "none";
                    } else if (response.data.jenis == "Instagram") {
                        document.getElementsByClassName('edit_div_isi_kontak')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_link')[0].style.display = "block";
                    } else if (response.data.jenis == "Maps") {
                        document.getElementsByClassName('edit_div_isi_kontak')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_link')[0].style.display = "block";
                    }

                    //open modal
                    $('#modalEdit{{$idmodal}}').modal('show');
                }
            });
        }

        // proses edit kontak
        $('#edit_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            var formData = new FormData(this);
            // formData.append('edit_prakata', CKEDITOR.instances['edit_prakata'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('kontak/update') }}/"+ id,
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
                        window.location.href = "{{url('admin/kontak')}}";
                    }else{
                        printErrorMsgEdit(data.error);
                    }
                }
            });
        });

        function destroy(id) {
            Swal.fire({
                icon: 'warning',
                title: 'Hapus Data',
                text: 'Apakah anda yakin ingin mengapus data ini ?',
                showCancelButton: !0,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('kontak/destroy') }}/" + id,
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${data.message}`,
                                showConfirmButton: true,
                                // timer: 3000
                            });
                            window.location.href = "{{url('admin/kontak')}}";
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            });
        }

        function printErrorMsgAdd (msg) {
            $(".print-error-msg-add").find("ul").html('');
            $(".print-error-msg-add").css('display','block');

            $.each( msg, function( key, value ) {
                $(".print-error-msg-add").find("ul").append('<li>'+value+'</li>');
            });
        }

        function printErrorMsgEdit (msg) {
            $(".print-error-msg-edit").find("ul").html('');
            $(".print-error-msg-edit").css('display','block');

            $.each( msg, function( key, value ) {
                $(".print-error-msg-edit").find("ul").append('<li>'+value+'</li>');
            });
        }
    </script>
@endsection
