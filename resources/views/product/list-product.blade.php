@extends('layouts.master')
@section('title')
    @lang('translation.Orders')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Ecommerce @endslot
        @slot('title') Orders @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div>

                <div class="float-end">
                    <form class="d-inline-flex mb-3">
                        <label class="form-check-label my-2 me-2" for="order-selectinput">Product</label>
                        <select class="form-select" id="order-selectinput">
                            <option selected>All</option>
                            <option value="1">Active</option>
                            <option value="2">Unpaid</option>
                        </select>
                    </form>

                </div>
                <a href={{url('product/create')}} type="button" class="btn btn-success waves-effect waves-light mb-3"><i
                        class="mdi mdi-plus me-1"></i> Add New Product</a>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                    <thead>
                        <tr class="bg-transparent">
                            <th style="width: 20px;">
                                <div class="form-check text-center font-size-16">
                                    <input type="checkbox" class="form-check-input" id="ordercheck">
                                    <label class="form-check-label" for="ordercheck"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Description</th>
                            
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product_models as $product)
                        <tr>
                            <td>
                                <div class="form-check text-center font-size-16">
                                    <input type="checkbox" class="form-check-input" id="ordercheck1">
                                    <label class="form-check-label" for="ordercheck1"></label>
                                </div>
                            </td>

                            <td><a href="javascript: void(0);" class="text-dark fw-bold">{{$product->id}}</a> </td>
                            <td>
                                {{$product->id_category_product}}
                            </td>
                            <td>{{$product->product}}</td>

                            <td>
                                {{$product->description}}
                            </td>
                        

                            <td>

                                <a href="{{ route('product.edit', $product->id) }}" class="px-3 text-primary"><i
                                    class="uil uil-pen font-size-18"></i></a>

                                {{-- <a href="javascript:void(0);" class="px-3 text-primary"><i
                                        class="uil uil-pen font-size-18"></i></a>
                                <a href="javascript:void(0);" class="px-3 text-danger"><i
                                        class="uil uil-trash-alt font-size-18"></i></a> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center text-mute" colspan="4">Data Product tidak tersedia</td>
                        </tr>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
            <!-- end table -->
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-datatables.init.js') }}"></script>
@endsection
