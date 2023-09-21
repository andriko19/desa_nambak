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
                                    <th>Prakata</th>
                                    <th>Hari</th>
                                    <th>Jam Oprasional</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($footer as $key => $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->jenis }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{!! $data->prakata !!}</td>
                                        <td>{{ $data->hari }}</td>
                                        <td>{{ $data->jam_oprasional }}</td>
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
                            <option value="Prakata">Prakata</option>
                            <option value="Oprasional">Oprasional</option>
                            {{-- @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul {{$title}}">
                    </div>
                    <div class="form-group mb-4 div_prakata">
                        <label for="prakata">prakata</label>
                        <textarea class="form-control" id="prakata" name="prakata" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 div_hari">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" placeholder="Contoh : Senin - Jum'at">
                    </div>
                    <div class="form-group div_jam">
                        <label for="jam_oprasional">Jam Oprasional</label>
                        <input type="text" class="form-control" id="jam_oprasional" name="jam_oprasional" placeholder="Contoh : 08:00 - 15:00">
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
                    <div class="form-group mb-4 edit_div_prakata">
                        <label for="edit_prakata">prakata</label>
                        <textarea class="form-control" id="edit_prakata" name="edit_prakata" rows="8"></textarea>
                    </div>
                    <div class="form-group mb-4 edit_div_hari">
                        <label for="edit_hari">Hari</label>
                        <input type="text" class="form-control" id="edit_hari" name="edit_hari" placeholder="hari {{$title}}">
                    </div>
                    <div class="form-group mb-4 edit_div_jam_oprasional">
                        <label for="edit_jam_oprasional">Jam Oprasional</label>
                        <input type="text" class="form-control" id="edit_jam_oprasional" name="edit_jam_oprasional" placeholder="jam_oprasional {{$title}}">
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
            document.getElementsByClassName('div_prakata')[0].style.display = "none";
            document.getElementsByClassName('div_hari')[0].style.display = "none";
            document.getElementsByClassName('div_jam')[0].style.display = "none";
            $('.js-select2-multi').select2({
                // placeholder : "--Pilih Siapa Yang Ingin di Tag--",
                // placeholder: "--Pilih Siapa Yang Ingin di Tag--",
                // allowClear: true,
            });
        });

        // ckeditor_add
        var prakata = document.getElementById("prakata");
            CKEDITOR.replace(prakata,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        //ckeditor_edit
        var prakata = document.getElementById("edit_prakata");
            CKEDITOR.replace(prakata,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

        // change jenis footer
        $('.jenis').change(function() {
            let jenis_val = $('.jenis').val();
            // console.log(jenis_val);
            if (jenis_val == "Prakata") {
                document.getElementsByClassName('div_prakata')[0].style.display = "block";
                document.getElementsByClassName('div_hari')[0].style.display = "none";
                document.getElementsByClassName('div_jam')[0].style.display = "none";
            } else if (jenis_val == "Oprasional") {
                document.getElementsByClassName('div_prakata')[0].style.display = "none";
                document.getElementsByClassName('div_hari')[0].style.display = "block";
                document.getElementsByClassName('div_jam')[0].style.display = "block";
            }
        });

        // proses submit add footer
        $('#add_new_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('prakata', CKEDITOR.instances['prakata'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('footer/store') }}",
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
                        window.location.href = "{{url('admin/footer')}}";
                    }else{
                        printErrorMsgAdd(data.error);
                    }
                }
            });
        });

        // show edit footer
        function update(id) {
            $.ajax({
                url: "{{ url('footer/show') }}/" + id,
                type: "get",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#edit_id').val(response.data.id);
                    $('#edit_jenis').val(response.data.jenis);
                    $('#edit_judul').val(response.data.judul);
                    CKEDITOR.instances['edit_prakata'].setData(response.data.prakata);
                    $('#edit_hari').val(response.data.hari);
                    $('#edit_jam_oprasional').val(response.data.jam_oprasional);

                    if (response.data.jenis == "Prakata") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_hari')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_jam_oprasional')[0].style.display = "none";
                    } else if (response.data.jenis == "Oprasional") {
                        document.getElementsByClassName('edit_div_prakata')[0].style.display = "none";
                        document.getElementsByClassName('edit_div_hari')[0].style.display = "block";
                        document.getElementsByClassName('edit_div_jam_oprasional')[0].style.display = "block";
                    }

                    //open modal
                    $('#modalEdit{{$idmodal}}').modal('show');
                }
            });
        }

        // proses edit footer
        $('#edit_{{$idmodal}}').submit(function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            var formData = new FormData(this);
            formData.append('edit_prakata', CKEDITOR.instances['edit_prakata'].getData());
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: "{{ url('footer/update') }}/"+ id,
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
                        window.location.href = "{{url('admin/footer')}}";
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
                        url: "{{ url('footer/destroy') }}/" + id,
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${data.message}`,
                                showConfirmButton: true,
                                // timer: 3000
                            });
                            window.location.href = "{{url('admin/footer')}}";
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
