@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Ecommerce @endslot
        @slot('title') Add Product @endslot
    @endcomponent
    {{-- <form> --}}

<form action="{{ route('product.store') }}" method="POST">
    {{-- @method('put') --}}
                            @csrf

                            <div class="form-group">
                                <label for="category">id_category_product</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    name="id_category_product" value="{{ old('category') }}">

                                <!-- error message untuk category -->
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product">product</label>
                                <input type="text" class="form-control @error('product') is-invalid @enderror"
                                name="product" value="{{ old('product') }}">

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                    name="description" id="content"
                                    class="form-control @error('description') is-invalid @enderror"
                                    rows="5"
                                   >{{ old('content') }}</textarea>

                                <!-- error message untuk content -->
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            {{-- <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a> --}}

                        </form>


        
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
