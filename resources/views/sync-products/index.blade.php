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
        @slot('pagetitle') Tables @endslot
        @slot('title') Sync Product @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                {{-- @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan --}}
                Perbedaan data : {{$diffdata}}
                 </div>
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>Product (Old Database)<span class="badge rounded-pill bg-primary float-end">{{$diffdata}} New</span></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" name="tbl1">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                 <th>SKU</th>
                                 <th>Product Name </th>  
                                  <th>Product Variants </th> 
                                  <th>Product Category </th>                             
                                  <th>Action</th>

                              
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($resultproduct_old as $product_old)
                        <tr>
                            <td>{{ $product_old->idproduk }}</td>
                            <td>{{ $product_old->sku}}</td>
                            <td>{{ $product_old->namaproduk}}
                             @if ($product_old->sync==true)
                             <span class="badge rounded-pill bg-primary float-end"> Need Sync</span>
                           
                              @endif
                            </td>
                            <td>{{ $product_old->variants}}</td>
                            <td>{{ $product_old->categoryname}}</td>
                            <td>
                                @if ($product_old->sync==true)
         <form action="{{ route('sync-product.store') }}" method="POST">
    	                    @csrf
                           
                                <input class="form-control" type="hidden" name="sku" value="{{ $product_old->sku}}" id="example-text-input" placeholder="sku">
                                <input class="form-control" type="hidden" name="namaproduk" value="{{ $product_old->namaproduk}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="beratasli" value="{{ $product_old->beratasli}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="panjang" value="{{ $product_old->panjang}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="lebar" value="{{ $product_old->lebar}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="tinggi" value="{{ $product_old->tinggi}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="shortdescription" value="{{ $product_old->shortdescription}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="kind" value="{{ $product_old->kind}}" id="example-text-input" placeholder="Name">
                                <input class="form-control" type="hidden" name="categoryname" value="{{ $product_old->categoryname}}" id="example-text-input" placeholder="categoryname">
                                <input class="form-control" type="hidden" name="collection" value="{{ $product_old->collection}}" id="example-text-input" placeholder="collection">
                                <input class="form-control" type="hidden" name="statusstock" value="{{ $product_old->statusstock}}" id="example-text-input" placeholder="statusstock">
                                <input class="form-control" type="hidden" name="status" value="{{ $product_old->status}}" id="example-text-input" placeholder="status">
                         
                        
                                {{-- <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a> --}}
                                <button type="submit" class="btn btn-primary">Sync</button>
                                </form>
                        @endif
                                
                            </td>
                        </tr>
	                    @endforeach
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>Product (New Database)</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;" name="tbl2">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                 <th>SKU</th>
                                 <th>Product Name </th>
                                 <th>Product Variant </th>
                                 <th>Product Category </th>
                                  <th>Action</th>

                              
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($product as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku}}</td>
                            <td>{{ $product->product_name}}</td>
                            <td>{{ $product->product_variant}}</td>
                            <td>{{ $product->product_category}}</td>

                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
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
        </div>

       
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
