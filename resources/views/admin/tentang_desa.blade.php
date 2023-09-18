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
                                    <th>Prakata</th>
                                    <th>Deskripsi</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th style="width: 300px" >Gambar</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($tentang_desa as $key => $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->jenis }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{!! $data->prakata !!}</td>
                                        <td>{!! $data->deskripsi !!}</td>
                                        <td>{!! $data->pertanyaan !!}</td>
                                        <td>{!! $data->jawaban !!}</td>
                                        <td style="text-align: center">
                                            @if(!empty($data->gambar))
                                                <img src="{{ URL::asset('/uploads/tentangDesa/'.$data->gambar) }}" class="" style="width: 25%" alt="{{ $data->judul }}">
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
                        <label for="judul">Jenis</label>
                        <select class="form-select jenis" name="jenis" id="jenis">
                            {{-- @foreach ($product_collection_models as $product_collection) --}}
                            <option value="0" selected> --Pilih Jenis {{$title}}-- </option>
                            <option value="Moto">Moto</option>
                            <option value="Profil">Profil</option>
                            <option value="Keunggulan">Keunggulan</option>
                            <option value="Prakata Pertanyaan">Prakata Pertanyaan</option>
                            <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                            {{-- @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 div_prakata">
                        <label for="prakata">Prakata</label>
                        <textarea class="form-control" id="prakata" name="prakata" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 div_deskripsi">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 div_pertanyaan">
                        <label for="pertanyaan">Pertanyaan</label>
                        <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 div_jawaban">
                        <label for="jawaban">Jawaban</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" rows="8"></textarea>
                    </div>
                    <div class="form-group div_file">
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
                        <label for="edit_jenis">Jenis</label>
                        <input type="text" class="form-control" id="edit_jenis" name="edit_jenis" placeholder="Judul {{$title}}" readonly>
                    </div>
                    <div class="form-group mb-4">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="edit_judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 edit_div_prakata">
                        <label for="edit_prakata">Prakata</label>
                        <textarea class="form-control" id="edit_prakata" name="edit_prakata" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 edit_div_deskripsi">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 edit_div_pertanyaan">
                        <label for="edit_pertanyaan">Pertanyaan</label>
                        <textarea class="form-control" id="edit_pertanyaan" name="edit_pertanyaan" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 edit_div_jawaban">
                        <label for="edit_jawaban">Jawaban</label>
                        <textarea class="form-control" id="edit_jawaban" name="edit_jawaban" rows="8"></textarea>
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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script> --}}

    <script>
        $(document).ready(function() {
            document.getElementsByClassName('div_prakata')[0].style.display = "none";
            document.getElementsByClassName('div_deskripsi')[0].style.display = "none";
            document.getElementsByClassName('div_pertanyaan')[0].style.display = "none";
            document.getElementsByClassName('div_jawaban')[0].style.display = "none";
            document.getElementsByClassName('div_file')[0].style.display = "none";
        });

        // ckeditor_add
        var prakata = document.getElementById("prakata");
            CKEDITOR.replace(prakata,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var deskripsi = document.getElementById("deskripsi");
            CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var pertanyaan = document.getElementById("pertanyaan");
            CKEDITOR.replace(pertanyaan,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var jawaban = document.getElementById("jawaban");
            CKEDITOR.replace(jawaban,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;


        //ckeditor_edit
        var prakata = document.getElementById("edit_prakata");
            CKEDITOR.replace(prakata,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var deskripsi = document.getElementById("edit_deskripsi");
            CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var pertanyaan = document.getElementById("edit_pertanyaan");
            CKEDITOR.replace(pertanyaan,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        var jawaban = document.getElementById("edit_jawaban");
            CKEDITOR.replace(jawaban,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;


        // change jenis tentang desas
        $('.jenis').change(function() {
            let jenis_val = $('.jenis').val();
            // console.log(jenis_val);
            if (jenis_val == "Moto") {
                document.getElementsByClassName('div_prakata')[0].style.display = "none";
                document.getElementsByClassName('div_deskripsi')[0].style.display = "block";
                document.getElementsByClassName('div_pertanyaan')[0].style.display = "none";
                document.getElementsByClassName('div_jawaban')[0].style.display = "none";
                document.getElementsByClassName('div_file')[0].style.display = "none";
            } else if (jenis_val == "Profil") {
                document.getElementsByClassName('div_prakata')[0].style.display = "none";
                document.getElementsByClassName('div_deskripsi')[0].style.display = "block";
                document.getElementsByClassName('div_pertanyaan')[0].style.display = "none";
                document.getElementsByClassName('div_jawaban')[0].style.display = "none";
                document.getElementsByClassName('div_file')[0].style.display = "block";
            } else if (jenis_val == "Keunggulan") {
                document.getElementsByClassName('div_prakata')[0].style.display = "none";
                document.getElementsByClassName('div_deskripsi')[0].style.display = "block";
                document.getElementsByClassName('div_pertanyaan')[0].style.display = "none";
                document.getElementsByClassName('div_jawaban')[0].style.display = "none";
                document.getElementsByClassName('div_file')[0].style.display = "none";
            } else if (jenis_val == "Prakata Pertanyaan") {
                document.getElementsByClassName('div_prakata')[0].style.display = "block";
                document.getElementsByClassName('div_deskripsi')[0].style.display = "none";
                document.getElementsByClassName('div_pertanyaan')[0].style.display = "none";
                document.getElementsByClassName('div_jawaban')[0].style.display = "none";
                document.getElementsByClassName('div_file')[0].style.display = "none";
            } else if (jenis_val == "Pertanyaan Umum") {
                document.getElementsByClassName('div_prakata')[0].style.display = "none";
                document.getElementsByClassName('div_deskripsi')[0].style.display = "none";
                document.getElementsByClassName('div_pertanyaan')[0].style.display = "block";
                document.getElementsByClassName('div_jawaban')[0].style.display = "block";
                document.getElementsByClassName('div_file')[0].style.display = "none";
            }
        });

        // proses submit add tentang_desa
        $('#add_new_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // console.log(formData);
            formData.append('prakata', CKEDITOR.instances['prakata'].getData());
            formData.append('deskripsi', CKEDITOR.instances['deskripsi'].getData());
            formData.append('pertanyaan', CKEDITOR.instances['pertanyaan'].getData());
            formData.append('jawaban', CKEDITOR.instances['jawaban'].getData());
            
            $.ajax({
                type: 'POST',
                url: "{{ url('tentang_desa/store') }}",
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
                        window.location.href = "{{url('admin/tentang_desa')}}";
                    }else{
                        printErrorMsgAdd(data.error);
                    }
                }
            });
        });

        // show edit tentang_desa
        function update(id) {
            $.ajax({
                url: "{{ url('tentang_desa/show') }}/" + id,
                type: "get",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#edit_id').val(response.data.id);
                    $('#edit_jenis').val(response.data.jenis);
                    $('#edit_judul').val(response.data.judul);
                    CKEDITOR.instances['edit_prakata'].setData(response.data.prakata);
                    CKEDITOR.instances['edit_deskripsi'].setData(response.data.deskripsi);
                    CKEDITOR.instances['edit_pertanyaan'].setData(response.data.pertanyaan);
                    CKEDITOR.instances['edit_jawaban'].setData(response.data.jawaban);

                    if (response.data.jenis == "Moto") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_deskripsi')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_pertanyaan')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_jawaban')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_file')[0].style.display = "none";
                    } else if (response.data.jenis == "Profil") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_deskripsi')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_pertanyaan')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_jawaban')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_file')[0].style.display = "block";
                        $('#gambar_lama').attr('src', "{{ asset('uploads/tentangDesa') }}/"+response.data.gambar);
                    } else if (response.data.jenis == "Keunggulan") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_deskripsi')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_pertanyaan')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_jawaban')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_file')[0].style.display = "none";
                    } else if (response.data.jenis == "Prakata Pertanyaan") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_deskripsi')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_pertanyaan')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_jawaban')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_file')[0].style.display = "none";
                    } else if (response.data.jenis == "Pertanyaan Umum") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_deskripsi')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_pertanyaan')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_jawaban')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_file')[0].style.display = "none";
                    }

                    //open modal
                    $('#modalEdit{{$idmodal}}').modal('show');
                }
            });
        }

        // proses edit tentang_desa
        $('#edit_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            var formData = new FormData(this);
            formData.append('edit_prakata', CKEDITOR.instances['edit_prakata'].getData());
            formData.append('edit_deskripsi', CKEDITOR.instances['edit_deskripsi'].getData());
            formData.append('edit_pertanyaan', CKEDITOR.instances['edit_pertanyaan'].getData());
            formData.append('edit_jawaban', CKEDITOR.instances['edit_jawaban'].getData());
            
            $.ajax({
                type: 'POST',
                url: "{{ url('tentang_desa/update') }}/"+ id,
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
                        window.location.href = "{{url('admin/tentang_desa')}}";
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
                        url: "{{ url('tentang_desa/destroy') }}/" + id,
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${data.message}`,
                                showConfirmButton: true,
                                // timer: 3000
                            });
                            window.location.href = "{{url('admin/tentang_desa')}}";
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
