@extends('layouts.master')
@section('title')
    @lang('General')
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
            Create General Information
        @endslot
    @endcomponent

    



    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="addproduct-accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#addproduct-billinginfo-collapse" class="text-dark"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="addproduct-billinginfo-collapse">
                                        <div class="p-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            01
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Legal</h5>
                                                    <p class="text-muted text-truncate mb-0">Isi Detail Informasi Dibawah
                                                    </p>
                                                </div>
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="addproduct-billinginfo-collapse" class="collapse show"
                                        data-bs-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">ID Customers</label>
                                                                <input type="number" class="form-control" id="formrow-nik-input" placeholder="ID Customers" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-password-input">Tahun Berdiri</label>
                                                                <input type="text" class="form-control" id="formrow-ar-input" placeholder="Contoh: 2013">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">NO Siup</label>
                                                                <input type="number" class="form-control" id="formrow-nik-input" placeholder="Masukan No Siup">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-password-input">NO TDP</label>
                                                                <input type="number" class="form-control" id="formrow-ar-input" placeholder="Masukan No TDP">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row col-xl-12 col-md-6">
                                                        <label class="col-package-label">Remarks</label>
                                                        <div class="">
                                                            <textarea class="form-control" style="height:150px" name="site_detail" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    grid
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <a href="#addproduct-img-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-haspopup="true" aria-controls="addproduct-img-collapse">
                                        <div class="p-4">

                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            02
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Contact Person</h5>
                                                    <p class="text-muted text-truncate mb-0">Isi Detail Informasi Dibawah
                                                    </p>
                                                </div>
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>

                                        </div>
                                    </a>

                                    <div id="addproduct-img-collapse" class="collapse"
                                        data-bs-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                        <div class="row"> 
                                            <div class="col-md-6"> 
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-email-input">Nama Lengkap</label>
                                                            <input type="number" class="form-control" id="formrow-nik-input" placeholder="Masukan nama lengkap">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-password-input">No Telpon    </label>
                                                            <input type="number" class="form-control" id="formrow-ar-input" placeholder="Masukan nomor telp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-email-input">Email</label>
                                                            <input type="email" class="form-control" id="formrow-nik-input" placeholder="Masukan email">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-password-input">Jabatan</label>
                                                            <input type="text" class="form-control" id="formrow-ar-input" placeholder="Masukan jabatan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                grid
                                            </div>
                                        </div>                                            

                                    </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <a href="#stripe-payment-gateway-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-haspopup="true" aria-controls="stripe-payment-gateway-collapse">
                                        <div class="p-4">

                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            03
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Outlet</h5>
                                                    <p class="text-muted text-truncate mb-0">Isi Detail Informasi Dibawah
                                                    </p>
                                                </div>
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>

                                        </div>
                                    </a>

                                    <div id="stripe-payment-gateway-collapse" class="collapse"
                                        data-bs-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Type</label>
                                                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                    <option value="1">Penagihan</option>
                                                                    <option value="2">Pengiriman</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Alamat</label>
                                                                <input type="text" class="form-control" id="formrow-nik-input" placeholder="Masukan alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Provinsi</label>
                                                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                    <option value="1">Penagihan</option>
                                                                    <option value="2">Pengiriman</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Kota</label>
                                                                <input type="text" class="form-control" id="formrow-nik-input" placeholder="Masukan alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Kecamatan</label>
                                                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                    <option value="1">Penagihan</option>
                                                                    <option value="2">Pengiriman</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Kelurahan</label>
                                                                <input type="number" class="form-control" id="formrow-nik-input" placeholder="Masukan alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Kode Pos</label>
                                                                <input type="number" class="form-control" id="formrow-nik-input" placeholder="Masukan alamat">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">Status</label>
                                                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                    <option value="1">Aktif</option>
                                                                    <option value="2">Tidak Aktif</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-password-input">Remarks</label>
                                                                <div class="">
                                                                    <textarea class="form-control" style="height:150px" name="site_detail" placeholder=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">grid</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <a href="#paypal-payment-gateway-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-haspopup="true" aria-controls="paypal-payment-gateway-collapse">
                                        <div class="p-4">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            04
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Account</h5>
                                                    <p class="text-muted text-truncate mb-0">Isi Detail Informasi Dibawah
                                                    </p>
                                                </div>
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>
                                    </a>

                                    <div id="paypal-payment-gateway-collapse" class="collapse"
                                        data-bs-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Payment Terms</label>
                                                        <input type="number" class="form-control" id="formrow-nik-input" placeholder="Ex: 30 Hari">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">ID Price</label>
                                                        <input type="text" class="form-control" id="formrow-ar-input" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Credit Limit</label>
                                                        <input type="number" class="form-control" id="formrow-nik-input" placeholder="Ex: 1.000.000">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">ID Price</label>
                                                        <input type="text" class="form-control" id="formrow-ar-input" placeholder="ID Price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Credit Limit</label>
                                                        <input type="number" class="form-control" id="formrow-nik-input" placeholder="Ex: 1.000.000">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">Max Nota</label>
                                                        <input type="text" class="form-control" id="formrow-ar-input" placeholder="Ex: 200.000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Bank</label>
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                            <option value="1">BCA</option>
                                                            <option value="2">BRI</option>
                                                            <option value="2">Mandiri</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">Atas Nama</label>
                                                        <input type="text" class="form-control" id="formrow-ar-input" placeholder="Ex: David Silva">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Account</label>
                                                        <input type="number" class="form-control" id="formrow-nik-input" placeholder="Ex: 1.000.000">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">Cabang</label>
                                                        <input type="text" class="form-control" id="formrow-ar-input" placeholder="Ex: Jl Said Anwar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-email-input">Status</label>
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                            <option value="1">Aktif</option>
                                                            <option value="2">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-password-input">Remarks</label>
                                                        <div class="">
                                                            <textarea class="form-control" style="height:150px" name="site_detail" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <a href="#midtrans-payment-gateway-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-haspopup="true" aria-controls="midtrans-payment-gateway-collapse">
                                        <div class="p-4">

                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            05
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Attachment</h5>
                                                    <p class="text-muted text-truncate mb-0">Isi Detail Informasi Dibawah
                                                    </p>
                                                </div>
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>

                                        </div>
                                    </a>

                                    <div id="midtrans-payment-gateway-collapse" class="collapse"
                                        data-bs-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                            <div class="input-group hdtuto control-group lst increment">

                                                <input type="file" name="filenames[]" class="myfrm form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"><i
                                                            class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>

                                            <div class="clone hide">
                                                <div class="hdtuto control-group lst input-group"
                                                    style="margin-top:10px">
                                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger" type="button"><i
                                                                class="fldemo glyphicon glyphicon-remove"></i>
                                                            Remove</button>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right">
            {{-- <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a> --}}
            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
        </div>
    </div>
    @endsection
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $(".btn-success").click(function() {
                    var lsthmtl = $(".clone").html();
                    $(".increment").after(lsthmtl);
    
                });
    
                $("body").on("click", ".btn-danger", function() {
                    $(this).parents(".hdtuto").remove();
    
                });
    
            });
        </script>
    
        <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
    @endsection
    