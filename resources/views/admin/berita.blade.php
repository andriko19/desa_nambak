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
                                    <th>Judul</th>
                                    <th>Isi Berita</th>
                                    <th>Tag</th>
                                    <th style="width: 300px" >Gambar</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($berita as $key => $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{!! $data->isi_berita !!}</td>
                                        <td>
                                            @php
                                                $listTag = explode(',', $data->tag);
                                                // dump($listTag[0]);
                                            @endphp

                                            @if ($listTag[0] != "")
                                                @foreach ( $listTag as $tag)
                                                    <a class="btn btn-success" href="{{$tag}}">{{$tag}}</a>
                                                @endforeach
                                            @endif

                                        </td>
                                        <td style="text-align: center">
                                            @if(!empty($data->gambar))
                                                <img src="{{ URL::asset('/uploads/berita/'.$data->gambar) }}" class="" style="width: 40%" alt="{{ $data->judul }}">
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
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="isi_berita">Isi Berita</label>
                        <textarea class="form-control" id="isi_berita" name="isi_berita" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="tag">Pilih Siapa Yang Ingin di Tag</label>
                        <select class="form-select js-select2-multi" id="tag" name="tag[]" multiple="multiple">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option></option>
                            {{-- <option value="0" selected>--Pilih Siapa Yang Ingin di Tag--</option> --}}
                            <option value="1">Indonesia</option>
                            <option value="2">Buka Lapak</option>
                            <option value="3">Shoppe</option>
                            <option value="4">Indraco</option>
                            {{-- @endforeach  --}}
                        </select>
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
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="edit_judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 edit_div_isi_berita">
                        <label for="edit_isi_berita">isi_berita</label>
                        <textarea class="form-control" id="edit_isi_berita" name="edit_isi_berita" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="tag">Pilih Siapa Yang Ingin di Tag</label>
                        <select class="form-select js-select2-multi" id="edit_tag" name="edit_tag[]" multiple="multiple">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option></option>
                            {{-- <option value="0" selected>--Pilih Siapa Yang Ingin di Tag--</option> --}}
                            <option value="1">Indonesia</option>
                            <option value="2">Buka Lapak</option>
                            <option value="3">Shoppe</option>
                            <option value="4">Indraco</option>
                            {{-- @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group edit_div_file">
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
    {{-- select2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // document.getElementsByClassName('div_deskripsi')[0].style.display = "none";
            // document.getElementsByClassName('div_file')[0].style.display = "none";
            $('.js-select2-multi').select2({
                // placeholder : "--Pilih Siapa Yang Ingin di Tag--",
                // placeholder: "--Pilih Siapa Yang Ingin di Tag--",
                // allowClear: true,
            });
        });

        // ckeditor_add
        var isi_berita = document.getElementById("isi_berita");
            CKEDITOR.replace(isi_berita,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;


        //ckeditor_edit
        var isi_berita = document.getElementById("edit_isi_berita");
            CKEDITOR.replace(isi_berita,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        // proses submit add berita
        $('#add_new_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('isi_berita', CKEDITOR.instances['isi_berita'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('berita/store') }}",
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
                        window.location.href = "{{url('admin/berita')}}";
                    }else{
                        printErrorMsgAdd(data.error);
                    }
                }
            });
        });

        // show edit berita
        function update(id) {
            $.ajax({
                url: "{{ url('berita/show') }}/" + id,
                type: "get",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#edit_id').val(response.data.id);
                    $('#edit_judul').val(response.data.judul);
                    CKEDITOR.instances['edit_isi_berita'].setData(response.data.isi_berita);
                    var strArrayTag = response.data.tag.split(",");
                    $("#edit_tag").select2().val(strArrayTag)
                        .change();
                    $('#gambar_lama').attr('src', "{{ asset('uploads/berita') }}/"+response.data.gambar);

                    //open modal
                    $('#modalEdit{{$idmodal}}').modal('show');
                }
            });
        }

        // proses edit berita
        $('#edit_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            var formData = new FormData(this);
            formData.append('edit_isi_berita', CKEDITOR.instances['edit_isi_berita'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('berita/update') }}/"+ id,
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
                        window.location.href = "{{url('admin/berita')}}";
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
                        url: "{{ url('berita/destroy') }}/" + id,
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${data.message}`,
                                showConfirmButton: true,
                                // timer: 3000
                            });
                            window.location.href = "{{url('admin/berita')}}";
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
