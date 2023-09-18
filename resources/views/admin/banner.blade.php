@extends('layouts.master')
@section('title')
    @lang($title)
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBanner">
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
                                    <th>Deskripsi</th>
                                    <th style="width: 300px" >Gambar</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($banners as $key => $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->jenis }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{!! $data->deskripsi !!}</td>
                                        <td style="text-align: center">
                                            @if(!empty($data->gambar))
                                                <img src="{{ URL::asset('/uploads/banner/'.$data->gambar) }}" class="" style="width: 60%" alt="{{ $data->judul }}">
                                            @endif
                                        </td>
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
<div class="modal fade" id="modalBanner" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="add_new_banner" class="forms-sample" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBannerLabel">Tambah Banner Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg-add" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Jenis</label>
                        <select class="form-select" name="jenis">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option value="0" selected> --Pilih Jenis Banner-- </option>
                            <option value="Pembuka">Pembuka</option>
                            <option value="Highlight">Highlight</option>
                            {{-- @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Banner">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Gambar</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="Gambar">
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
<div class="modal fade" id="modalEditBanner" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="edit_banner" class="forms-sample" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBannerLabel">Edit Banner Lama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg-edit" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    <div class="form-group mb-4">
                        <label for="judul">Jenis</label>
                        <select class="form-select" name="edit_jenis">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option value="0" selected> --Pilih Jenis Banner-- </option>
                            <option value="Pembuka">Pembuka</option>
                            <option value="Highlight">Highlight</option>
                            {{-- @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="edit_judul" placeholder="Judul Banner">
                    </div>
                    <div class="form-group mb-4">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_file">Gambar</label>
                        <div class="row">
                            <div class="col" style="text-align: center">
                                <img id="gambar_lama" src="about:blank" class="" style="width: 60%" alt=""> <br>
                                <p>Gambar lama</p>
                            </div>
                            <div class="col">
                                <input type="file" class="form-control" id="edit_file" name="edit_file" placeholder="Gambar">
                            </div>
                        </div>
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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script> --}}

    <script>
        var deskripsi = document.getElementById("deskripsi");
            CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var deskripsi = document.getElementById("edit_deskripsi");
            CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        // proses submit add new job
        $('#add_new_banner').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('deskripsi', CKEDITOR.instances['deskripsi'].getData());

            $.ajax({
                type: 'POST',
                url: "{{ url('banner/store') }}",
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
                        window.location.href = "{{url('admin/banner')}}";
                    }else{
                        printErrorMsgAdd(data.error);
                    }
                }
            });
        });

        // show edit banner
        function update(id) {
            $.ajax({
                url: "{{ url('banner/show') }}/" + id,
                type: "get",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#edit_id').val(response.data.id);
                    $('[name="edit_jenis"]').val(response.data.jenis);
                    $('#edit_judul').val(response.data.judul);
                    CKEDITOR.instances['edit_deskripsi'].setData(response.data.deskripsi);
                    $('#gambar_lama').attr('src', "{{ asset('uploads/banner') }}/"+response.data.gambar);
                    //open modal
                    $('#modalEditBanner').modal('show');
                }
            });
        }

        // proses submit add new job
        $('#edit_banner').submit(function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            var formData = new FormData(this);
            formData.append('edit_deskripsi', CKEDITOR.instances['edit_deskripsi'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('banner/update') }}/"+ id,
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
                        window.location.href = "{{url('admin/banner')}}";
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
                        url: "{{ url('banner/destroy') }}/" + id,
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${data.message}`,
                                showConfirmButton: true,
                                // timer: 3000
                            });
                            window.location.href = "{{url('admin/banner')}}";
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
