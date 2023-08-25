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

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning  alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Form General Information</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-4">
                                {{-- <form action="{{ route('generals.store') }}" method="POST"> --}}
                                    {!! Form::open(array('route' => 'generals.store','method'=>'POST')) !!}
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Type Usaha</label>
                                                <select class="form-select @error('type_usaha') border border-danger @enderror" name="type_usaha" id="floatingSelectGrid" aria-label="Floating label select example">
                                                    <option value="">-- Pilih Type Usaha --</option>
                                                    <option value="TK" @if (old('type_usaha') == 'TK') selected="selected" @endif>TK</option>
                                                    <option value="UD" @if (old('type_usaha') == 'UD') selected="selected" @endif>UD</option>
                                                    <option value="CV" @if (old('type_usaha') == 'CV') selected="selected" @endif>CV</option>
                                                    <option value="PT" @if (old('type_usaha') == 'PT') selected="selected" @endif>PT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Nama usaha</label>
                                                <input type="text" class="form-control @error('nama_usaha') border border-danger @enderror" name="nama_usaha" id="formrow-nama-input" placeholder="Contoh : SUKA CERIA ABADI (*Wajib kapital)" value="{{ old('nama_usaha') }}" >
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Nama Lengkap</label>
                                                <input type="text" class="form-control @error('nama_lengkap') border border-danger @enderror" name="nama_lengkap" id="formrow-nama-input" placeholder="Contoh : Budi Utomo" value="{{ old('nama_lengkap') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Jabatan </label>
                                                <input type="text" class="form-control @error('jabatan') border border-danger @enderror" name="jabatan" id="formrow-nama-input" placeholder="Contoh : Pemilik / Owner" value="{{ old('jabatan') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Telepon</label>
                                                <input type="text" class="form-control @error('telepon') border border-danger @enderror" name="telepon" id="formrow-telepon-input" placeholder="Contoh : (031)123456" value="{{ old('telepon') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Mobile</label>
                                                <input type="Number" class="form-control @error('mobile_phone') border border-danger @enderror" name="mobile_phone" id="formrow-mobile-input" placeholder="Contoh : 081123456789" value="{{ old('mobile_phone') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Email</label>
                                                <input type="email" class="form-control @error('email') border border-danger @enderror" name="email" id="formrow-email-input" placeholder="Contoh : ceriaabadi@gmail.com" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Website</label>
                                                <input type="text" class="form-control @error('web_site') border border-danger @enderror" name="web_site" id="formrow-web-input" placeholder="Contoh : www.ceriabadi.com" value="{{ old('web_site') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">NO NPWP</label>
                                                <input type="Number" class="form-control @error('no_npwp') border border-danger @enderror" name="no_npwp" id="formrow-nonpwp-input" placeholder="Masukan nomor NPWP " value="{{ old('no_npwp') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Nama NPWP</label>
                                                <input type="text" class="form-control @error('nama_npwp') border border-danger @enderror" name="nama_npwp" id="formrow-namanpwp-input" placeholder="Masukan nama NPWP" value="{{ old('nama_npwp') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Alamat NPWP</label>
                                                <input type="text" class="form-control @error('alamat_npwp') border border-danger @enderror" name="alamat_npwp" id="formrow-alamatnpwp-input" placeholder="Masukan alamat NPWP" value="{{ old('alamat_npwp') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">NIK</label>
                                                <input type="number" class="form-control @error('nik') border border-danger @enderror" name="nik" id="formrow-nik-input" placeholder="Masukan nomor induk kependudukan" value="{{ old('nik') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Account Representative</label>
                                                <input type="hidden" class="form-control" name="ar" id="formrow-ar-input" value="{{Str::ucfirst(Auth::user()->id)}}
                                                ">
                                                <input type="hidden" class="form-control" name="id_general" id="formrow-ar-input" value="{{$data[0]->id}}
                                                ">
                                                <input type="text" class="form-control" name="" id="" value="{{Str::ucfirst(Auth::user()->name)}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <a href="{{ route('generals.index') }}" class="btn btn-md btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                {!! Form::close() !!}
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
