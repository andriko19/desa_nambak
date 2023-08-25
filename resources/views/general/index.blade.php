@extends('layouts.master')
@section('title')
    @lang('translation.General')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            General
        @endslot
        @slot('title')
            List General Information
        @endslot
    @endcomponent

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('generals.create') }}"> Create New General</a>
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
                                    <th>NO</th>
                                    <th>ID Customers</th>
                                    <th>Type Usaha</th>
                                    <th>Nama Usaha</th>
                                    <th>Nama Pemilik</th>
                                    <th>AR</th>
                                    <th width="280px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $general)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $general->id_customer }}</td>
                                        <td>{{ $general->type_usaha }}</td>
                                        <td>{{ $general->nama_usaha }}</td>
                                        <td>{{ $general->nama_lengkap }}</td>
                                        <td>{{ $general->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-medium btn-success">Edit</a>
                                            <a href="#" class="btn btn-medium btn-primary">Detail</a>
                                            <a href="{{url('general/atribut')}}" class="btn btn-medium btn-warning">Berkas</a>
                                            {{-- <a href="#" class="btn btn-medium btn-danger">Hapus</a> --}}
                                            <a href="generals/destroy/{{$general->id_general}}" class="btn btn-xs btn-danger" onclick="return confirm('yakin?');">Delete</a>
                                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['generals.destroy', $general->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!} --}}

                                           {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                           <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!} --}}
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
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
