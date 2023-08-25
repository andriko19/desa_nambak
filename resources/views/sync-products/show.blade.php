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
        @slot('title') Product @endslot
    @endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        
    </div>
</div>

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                     <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">SKU</label>
                        <div class="col-md-10">
                            : {{ $product_models[0]->sku }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">BRAND</label>
                        <div class="col-md-10">
                            : {{ $product_models[0]->product_brand }}
                        </div>
                    </div>

                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_name
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_name}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_variant
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_variant}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_shortdesc
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_shortdesc}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_desc
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_desc}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_weight
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_weight}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_length
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_length}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_width
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_width}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_height
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_height}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_category
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_category}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_collection
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_collection}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            product_kind
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->product_kind}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            status_stock
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->status_stock}}
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">
                            status
                            </label>
                        <div class="col-md-10">
                     : {{ $product_models[0]->status}}
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product-kinds.index') }}"> Back</a>
        </div>
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
