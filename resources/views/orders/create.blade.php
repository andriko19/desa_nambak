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
        @slot('pagetitle') Supresso @endslot
        @slot('title') Create New Product @endslot
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

<div class="row"><form action="{{ route('products.store') }}" method="POST">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
    
    	@csrf


            {{-- <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-package-label">Type Name :</label>
                <div class="col-md-10">
                <input class="form-control" type="text" name="product_package_name" value="" id="example-text-input" placeholder="Product Package Name">
                </div>
            </div> --}}


		    {{-- <div class="mb-3 row">
		        <label for="example-text-input" class="col-md-2 col-package-label">Description :</label>
		        <div class="col-md-10">
                <textarea class="form-control" style="height:150px" name="product_package_desc" placeholder="Product Package Desc"></textarea>
		        </div>
		    </div> --}}

            {{-- sku}}abcd{{ $product->sku}}</td>
            product_name}}abcd{{ $product->product_name}}</td>
            product_detail}}abcd{{ $product->product_detail}}</td>
            product_shortdetail}}abcd{{ $product->product_shortdetail}}</td>
            product_brand}}abcd{{ $product->product_brand}}</td>
            product_collection}}abcd{{ $product->product_collection}}</td>
            product_type}}abcd{{ $product->product_type}}</td>
            product_form}}abcd{{ $product->product_form}}</td>
            product_package}}abcd{{ $product->product_package}}</td>
            product_price}}abcd{{ $product->product_price}}</td>
            product_price_currency}}abcd{{ $product->product_price_currency}}</td>
            product_weight}}abcd{{ $product->product_weight}}</td>
            product_width}}abcd{{ $product->product_width}}</td>
            product_height}}abcd{{ $product->product_height}}</td>
            product_length}}abcd{{ $product->product_length}}</td>
            product_acidityscore}}abcd{{ $product->product_acidityscore}}</td>
            product_aciditydesc}}abcd{{ $product->product_aciditydesc}}</td>
            product_bodyscore}}abcd{{ $product->product_bodyscore}}</td>
            product_bodydesc}}abcd{{ $product->product_bodydesc}}</td>
            product_roastdesc}}abcd{{ $product->product_roastdesc}}</td>
            product_typedesc}}abcd{{ $product->product_typedesc}}</td>
            product_intensity}}abcd{{ $product->product_intensity}}</td>
            status_stock}}abcd{{ $product->status_stock}}</td>
            status}}abcd{{ $product->status}}</td> --}}



            <div class="row">
        <div class="col-lg-12">
            <div id="addproduct-accordion" class="custom-accordion">
                <div class="card">
                    <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            01
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Product Info</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>
                    </a>

                    <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                            <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> SKU:</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="sku" placeholder="">
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Name :</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="product_name" placeholder="">
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Detail :</label>
                                    <div class="col-md-10">
                                    <textarea class="form-control" style="height:150px" name="product_detail" placeholder=""></textarea>
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Shortdetail :</label>
                                    <div class="col-md-10">
                                    <textarea class="form-control" style="height:150px" name="product_shortdetail" placeholder=""></textarea>
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Brand :</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="product_brand" placeholder="">
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Collection :</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="product_collection">
                                        @foreach ($product_collection_models as $product_collection)
                                            <option value={{$product_collection->id}}>{{$product_collection->product_collection_name}}</option>
                                        @endforeach 
                                        </select>
                                
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Type :</label>
                                    <div class="col-md-10">

                                        <select class="form-select" name="product_type">
                                        @foreach ($product_type_models as $product_type)
                                            <option value={{$product_type->id}}>{{$product_type->product_type_name}}</option>
                                        @endforeach 
                                        </select>

                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Form :</label>
                                    <div class="col-md-10">

                                        <select class="form-select" name="product_form">
                                        @foreach ($product_form_models as $product_form)
                                            <option value={{$product_form->id}}>{{$product_form->product_form_name}}</option>
                                        @endforeach 
                                        </select>

                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Package :</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="product_package">
                                        @foreach ($product_package_models as $product_package)
                                            <option value={{$product_package->id}}>{{$product_package->product_package_name}}</option>
                                        @endforeach 
                                        </select>

                                
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Price :</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="product_price" placeholder="">
                                    </div>
                            
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-package-label"> Product Price Currency :</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="product_price_currency" placeholder="">
                                    </div>
                            
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                        aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                        aria-controls="addproduct-img-collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            02
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Product Image</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>
                    </a>

                    <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                           

                            <div class="input-group hdtuto control-group lst increment" >
                           
                            <input type="file" name="filenames[]" class="myfrm form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                            </div>

                            <div class="clone hide">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="filenames[]" class="myfrm form-control">
                                <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                        aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                        aria-controls="addproduct-metadata-collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            03
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Meta Data</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>
                    </a>

                    <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Weight :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_weight" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Width :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_width" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Height :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_height" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Length :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_length" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Acidity Score :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_acidityscore" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Acidity Desc :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_aciditydesc" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Body Score :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_bodyscore" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Body Desc :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_bodydesc" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Roast Desc :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_roastdesc" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Type Desc :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_typedesc" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Product Intensity :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="product_intensity" placeholder="">
                                                </div>
                                        
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label"> Status Stock :</label>
                                                <div class="col-md-10">
                                                <input class="form-control" type="text" name="status_stock" placeholder="">
                                                </div>
                                        
                                            </div>
                                        
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-package-label">Status :</label>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="status">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
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
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
		        <button type="submit" class="btn btn-primary">Submit</button>
            </div></form>
    </div>

@endsection
@section('script')
<script type="text/javascript">

    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
          
      });
      
      $("body").on("click",".btn-danger",function(){ 
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
