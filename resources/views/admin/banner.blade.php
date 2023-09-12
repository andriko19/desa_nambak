@extends('layouts.master')
@section('title')
    @lang('Banner')
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
            List Banner
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBanner">
                            Tambah Banner Baru
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
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="280px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                          @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)

                                                {{ $v }}

                                            @endforeach
                                          @endif
                                        </td>
                                        <td>
                                           <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                           <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach --}}

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
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Banner">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        var deskripsi = document.getElementById("deskripsi");
            CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;

    </script>
@endsection
