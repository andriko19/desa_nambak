@extends('layouts.master')
@section('title')
    @lang('translation.Datatables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Tables
        @endslot
        @slot('title')
            Transaction VEND
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="card">
                <div class="card-body">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('blog-article-category.create') }}"> </a>
                    @endcan

                </div>
            </div> --}}
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
                                    <th>No.</th>
                                    {{-- <th>Id.</th> --}}
                                    <th>Source</th>
                                    {{-- <th>Reg.Id</th> --}}
                                    <th>Market Id</th>
                                    <th>Customer Name</th>
                                    {{-- <th>User Id</th> --}}
                                    <th>Username</th>
                                    <th>Sale Date</th>
                                    <th>Total Price</th>
                                    <th>Total Cost</th>
                                    <th>Tax </th>
                                    <th>Note</th>
                                    <th>STATUS</th>
                                    <th>Invoice Number</th>
                                    <th>register_sales (Product)</th>
                                    {{-- <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>--}}
                                    <th>Action</th> 


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($responsetransaction as $transaction)
                                    <tr>


                                        <td>{{ ++$i }}</td>

                                        {{-- <td>{{ $transaction['id'] }}</td> --}}
                                        <td>{{ $transaction['source'] }}</td>
                                        {{-- <td>{{ $transaction['register_id'] }}</td> --}}
                                        <td>{{ $transaction['market_id'] }}</td>
                                        <td>{{ $transaction['customer_name'] }}</td>
                                        {{-- <td>{{ $transaction['user_id'] }}</td> --}}
                                        <td>{{ $transaction['user_name'] }}</td>
                                        <td>{{ $transaction['sale_date'] }}</td>
                                        <td>{{ round($transaction['total_price'],2) }}</td>
                                        <td>{{ round($transaction['total_cost'],2) }}</td>
                                        <td>{{ round($transaction['total_tax'],2) }}</td>
                                        <td>{{ $transaction['note'] }}</td>
                                        <td>{{ $transaction['status'] }}</td>
                                        <td>{{ $transaction['invoice_number'] }}</td>
                                        <td>
                                            <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    {{-- <th>id</th>
                                                    <th>product_id</th>
                                                    <th>register_id</th>
                                                    <th>sequence</th>
                                                    <th>handle</th> --}}
                                                    <th>sku</th>
                                                    <th>name</th>
                                                    <th>quantity</th>
                                                    <th>price</th>
                                                    <th>cost</th>
                                                    <th>price_set</th>
                                                    <th>discount</th>
                                                    <th>loyalty_value</th>
                                                    <th>tax</th>
                                                    {{-- <th>tax_id</th>
                                                    <th>tax_name</th>
                                                    <th>tax_rate</th> --}}
                                                    <th>tax_total</th>
                                                    <th>price_total</th>
                                                    {{-- <th>display_retail_price_tax_inclusive</th> --}}
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($transaction['register_sale_products']  as $product)
                                            <tr>
                                                    {{-- <td>{{ $product["id"] }} </td>
                                                    <td>{{ $product["product_id"] }} </td>
                                                    <td>{{ $product["register_id"] }} </td>
                                                    <td>{{ $product["sequence"] }} </td>
                                                    <td>{{ $product["handle"] }} </td> --}}
                                                    <td>{{ $product["sku"] }} </td>
                                                    <td>{{ $product["name"] }} </td>
                                                    <td>{{ $product["quantity"] }} </td>
                                                    <td>{{ round($product["price"],2) }} </td>
                                                    <td>{{ round($product["cost"],2) }} </td>
                                                    <td>{{ round($product["price_set"],2) }} </td>
                                                    <td>{{ round($product["discount"],2) }} </td>
                                                    <td>{{ round($product["loyalty_value"],2) }} </td>
                                                    <td>{{ round($product["tax"],2) }} </td>
                                                    {{-- <td>{{ $product["tax_id"] }} </td>
                                                    <td>{{ $product["tax_name"] }} </td>
                                                    <td>{{ $product["tax_rate"] }} </td> --}}
                                                    <td>{{ round($product["tax_total"],2) }} </td>
                                                    <td>{{ round($product["price_total"],2) }} </td>
                                                    {{-- <td>{{ $product["display_retail_price_tax_inclusive"] }} </td> --}}
                                                    <td>{{ $product["status"] }} </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                        </td>
                                        {{-- <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td> --}}



                                        <td>
                                            <form action="{{ route('products.destroy', $transaction['id']) }}"
                                                method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('blog-article-category.show', $transaction['id']) }}">Show</a>
                                                @can('product-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('blog-article-category.edit', $transaction['id']) }}">Edit</a>
                                                @endcan


                                                @csrf
                                                @method('DELETE')
                                                @can('product-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                @endcan
                                            </form>
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
