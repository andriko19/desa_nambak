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
        @slot('pagetitle')
            Supresso
        @endslot
        @slot('title')
            Detail Order
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12 margin-tb">


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
                                    <th>Number.</th>
                                    <th>SKU</th>
                                    <th>PRODUK</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                   
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($product_order as $item)
                                    <tr>
                                        <td>{{ ($loop->index)+1 }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>{{ $item->namaproduk }}</td>
                                        <td>{{ round($item->hargaproduk,2) }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ round($item->subtotalproduk,2) }}</td>
                                        <td></td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('admin/orders') }}"> Back</a>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
