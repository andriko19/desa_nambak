@extends('layouts.master')
@section('title')
    @lang('translation.Datatables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Supresso
        @endslot
        @slot('title')
            Orders List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-body">
                    @can('product-create')
                        {{-- <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a> --}}
                    @endcan


                    {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Date Range</label>
                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                data-date-autoclose="true" data-provide="datepicker"
                                data-date-container='#datepicker6'>
                                <input type="text" class="form-control" name="start" placeholder="Start Date" />
                                <input type="text" class="form-control" name="end" placeholder="End Date" />
                            </div>
                        </div>
                       
                    </div> --}}



                    <div class="col-12 mb-4">
                        <div class="row justify-content-md-between">

                            <!-- periode filter -->
                            {{-- <div class="col-md-auto mb-3 mb-md-0"> --}}
                            <form method="POST" action="{{ url('admin/orders') }}" class="mb-3">


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date Range</label>
                                        <div class="input-daterange input-group" id="datepicker6"
                                            data-date-format="dd-mm-yyyy" data-date-autoclose="true"
                                            data-provide="datepicker" data-date-container='#datepicker6'>
                                            <input type="text" class="form-control" name="start"
                                                placeholder="Start Date" />
                                            <input type="text" class="form-control" name="end"
                                                placeholder="End Date" />
                                        </div>
                                    </div>

                                </div>



                                @csrf
                                <div class="col-lg-6">
                                    <input type="submit" class="form-control" name="autoClickBtn" id="autoClickBtn"
                                        value="filter" class="btn btn-outline-success px-4 bg-info">
                                </div>
                            </form>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Buttons example</h4>
                    <p class="card-title-desc">The Buttons extension for DataTables
                        provides a common set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable. The core library
                        provides the based framework upon which plug-ins can built.
                    </p> --}}
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Order</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Order Total</th>
                                    <th>Payment Type</th>
                                    <th>Payment</th>
                                    <th>Update Tracking Number</th>
                                    <th>Action</th>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_models as $order)
                                    <tr>


                                        <td>{{ ++$i }}</td>
                                        <td>{{ $order->nomerorder }}</td>
                                        <td>{{ $order->namalengkap }}</td>
                                        <td>{{ $order->tanggalorder }}</td>
                                        <td>{{ $order->ordertotal }}</td>
                                        <td>{{ $order->company }}</td>
                                        <td>{{ $order->payment }}</td>
                                        <td>
                                            <form class="" action="{{ route('orders-tracking-number') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="nomerorder" value="{{ $order->nomerorder }}">
                                                @if (!empty($order->tracking_number))
                                                    <input type="text" class="form-control w-100 mb-2" name="trackingnumber"
                                                        value="{{ $order->tracking_number }}">
                                                @else
                                                    <input class="form-control w-100 mb-2" type="text" name="trackingnumber"
                                                        value="">
                                                @endif

                                                <button class="btn btn-dark" type="submit">Update Track ID</button>
                                                <a class="btn btn-warning"  onclick="getdetailshipping('{{ $order->tracking_number }}','{{ $i }}')">Detail</a>
                                            </form>

                                            {{-- <button class="btn btn-dark"
                                                onclick="getdetailshipping('{{ $order->tracking_number }}','{{ $i }}')">Detail</button> --}}


                                        </td>
                                        <td>
                                            {{-- <button class="btn btn-dark"
                                                onclick="getdetailorder('{{ $order->nomerorder }}',{{ $i }}, '{{ $order->payment }}')">Detail {{ $order->nomerorder }} - {{ $i }} - {{ $order->payment }}</button> --}}

                                            <button class="btn btn-dark"
                                                onclick="getdetailorder('{{ $order->nomerorder }}',{{ $i }}, '{{ $order->payment }}')">Detail</button>


                                            {{-- <a class="btn btn-info"
                                                href="{{ route('ordersdetail', 'id=' . $order->nomerorder . '&payment=' . $order->payment) }}">Detail
                                                Orders</a> --}}


                                            @if ($order->payment_status == 'incomplete')
                                                <a class="btn btn-warning"
                                                    href="{{ route('updatepaymentstatus', 'id=' . $order->payment_id) }}">Check
                                                    Payment</a>
                                        </td>
                                    @elseif($order->payment_status == 'succeeded')
                                        <a class="btn btn-success"
                                            href="{{ route('updatepaymentstatus', 'id=' . $order->payment_id) }}">{{ $order->payment_status }}</a>
                                        </td>
                                    @elseif($order->payment_status == 'canceled')
                                        <a class="btn btn-dark"
                                            href="{{ route('updatepaymentstatus', 'id=' . $order->payment_id) }}">{{ $order->payment_status }}</a>
                                        </td>
                                    @else
                                        <a class="btn btn-warning"
                                            href="{{ route('updatepaymentstatus', 'id=' . $order->payment_id) }}">Check
                                            Payment</a></td>
                                @endif






                                {{-- <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td> --}}
                                {{-- <td>
                                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                   
                                    @can('product-edit')
                                    <a class="btn btn-primary" href="{{ route('products.edit',$order->id) }}">Edit</a>
                                    @endcan
                                    <a class="btn btn-warning" href="{{ route('product-images.index','id_product='.$order->id) }}">Create Track number</a>

                                    @csrf
                                    @method('DELETE')
                                    @can('product-delete')
                                
                                    @endcan
                                </form>

                                <a class="btn btn-warning" href="{{ route('updatepaymentstatus','id='.$order->payment_id) }}">Check Payment</a>
                            </td> --}}


                                </tr>
                                <tr>
                                    <td colspan='9'>
                                        <div class="collapse coba" id="{{ $i }}">
                                            <div id="detail{{ $i }}">
                                                <div class="spinner-border text-success" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div> Loading...Please Wait
                                            </div>
                                            <div id="detailtable{{ $i }}"></div>

                                            <div id="details{{ $i }}">
                                                <div class="spinner-border text-success" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div> Loading...Please Wait
                                            </div>
                                            <div id="detailshipping{{ $i }}"></div>
                                        </div>


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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function getdetailorder(nomerorder, index, type) {
            // alert("asd");


            var element = document.getElementById(index);

            element.classList.toggle("show");


            var bodyFormData = new FormData();
            bodyFormData.append('nomerorder', nomerorder);
            bodyFormData.append('type', type);
            axios({
                    method: 'post',
                    url: '../api/getsales',
                    data: bodyFormData,
                })
                .then(response => {

                    if (type == 'stripe') {
                        console.log("stripe");
                        console.log(response.data.data);
                        var data = response.data.data[0];
                        document.getElementById("detail" + index).innerHTML = data.customer_id;
                        console.log(data);
                        console.log("jumlah data : " + data.line_items.length);
                    } else {
                        alert('vend');
                        console.log(response.data.data);
                        var data = response.data.data[0];
                        document.getElementById("detail" + index).innerHTML = data.customer_id;
                        console.log(data);
                        console.log("jumlah data : " + data.line_items.length);
                        var stringtable =
                            "<table class='table table-striped dt-responsive nowrap' style='border-collapse: collapse; border-spacing: 0; width: 100%;'>";
                        data.line_items.forEach(element => {
                            var total = element.vend_price_total.toFixed(2) * element.vend_quantity;
                            if (element.vend_price_total != 0) {
                                stringtable += "<tr><td>" + element.vend_quantity + "</td><td>" + element
                                    .namaproduk + "</td><td>@SGD " + element.vend_price_total.toFixed(2) +
                                    "</td><td>incl SGD " + element.vend_tax_total.toFixed(2) +
                                    " Tax (GST)</td><td>SGD " + total.toFixed(2) + "</td></tr>";
                            } else {
                                stringtable += "<tr><td>" + element.vend_quantity + "</td><td>(" + element
                                    .product_name + ")</td><td>@SGD " + element.vend_price_total.toFixed(2) +
                                    "</td><td>incl SGD " + element.vend_tax_total.toFixed(2) +
                                    " Tax (GST)</td><td>SGD " + total.toFixed(2) + "</td></tr>";
                            }

                        });
                        stringtable += "<tr><td rowspan=3 colspan=2> Note" + data.note +
                            "</td><td colspan=2>Subtotal</td><td>SGD " + data.total_price.toFixed(2) + "</td></tr>";
                        stringtable += "<tr><td colspan=2><b>Total Tax (GST)</b></td><td>SGD " + data.total_tax.toFixed(
                            2) + "</td></tr>";
                        stringtable += "<tr><td colspan=2>SALE TOTAL</td><td>SGD " + data.total_price_incl.toFixed(2) +
                            "</td></tr>";
                        stringtable += "</table>";
                    }


                    document.getElementById("detailtable" + index).innerHTML = stringtable;


                })
                .catch(function(err) {
                    console.log(err);

                });

            // const options = {
            //     method: 'GET',
            //     headers: {
            //         accept: 'application/json',
            //         'Access-Control-Allow-Origin': '*',
            //         'Authorization': 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            //         'Cookie': 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            //         'key': 'e791365f6d3d4bb1a6f03c8ad509f106'
            //     }
            // };

            // fetch('https://supressocoffee.vendhq.com/api/2.0/search?type=sales&invoice_number=2022.0002495', options)
            //     .then(response => response.json())
            //     .then(response => console.log(response))
            //     .catch(err => console.error(err));


            // $.ajax({
            //     url: 'https://supressocoffee.vendhq.com/api/2.0/search?type=sales&invoice_number=2022.0002495',
            //     headers: {
            //         'Authorization': 'Bearer Cl2iG3P2M5cs6JTkGGWpl_VETaQqAMucGlqehvCv',
            //         'Cookie': 'rguserid=4f34753d-6764-412e-b2fe-6e99d2c0871a; rguuid=true; rgisanonymous=true',
            //         'key': 'e791365f6d3d4bb1a6f03c8ad509f106'
            //     },
            //     type: 'get',
            //     success: function(dataResult) {
            //         console.log(dataResult);
            //         var dataResult = JSON.parse(dataResult);

            //     }
            //     error: function(xhr, ajaxOptions, thrownError) {
            //         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            //     }
            // });


        }


        function getdetailshipping(idshipping, index) {
          
            var element = document.getElementById(index);

            element.classList.toggle("show");


            var bodyFormData = new FormData();
            bodyFormData.append('idshipping', idshipping);

            axios({
                    method: 'post',
                    url: '../api/getshipping',
                    data: bodyFormData,
                })
                .then(response => {

                    console.log(response.data.shipments);
                    var data = response.data.shipments[0];
                    document.getElementById("details" + index).innerHTML = data.easyship_shipment_id;
                    //     console.log(data);
                    //console.log("jumlah data : "+data.line_items.length);
                    // var stringtable = 
                    var sender = "<p>SENDER</p><p>" + data.sender_address.line_1 + "<br>" + data.sender_address.line_2 +
                        "<br>" + data.sender_address.state + "<br>" + data.sender_address.city + "<br>" + data
                        .sender_address.postal_code + "<br>" + data.sender_address.country_alpha2 + "<br>" + data
                        .sender_address.contact_name + "<br>" + data.sender_address.company_name + "<br>" + data
                        .sender_address.contact_phone + "<br>" + data.sender_address.contact_email + "</p>";
                    console.log(sender);
                    var destination = "<p>DESTINATION</p><p>" + data.destination_address.line_1 + "<br>" + data
                        .destination_address.line_2 + "<br>" + data.destination_address.state + "<br>" + data
                        .destination_address.city + "<br>" + data.destination_address.postal_code + "<br>" + data
                        .destination_address.country_alpha2 + "<br>" + data.destination_address.contact_name + "<br>" +
                        data.destination_address.company_name + "<br>" + data.destination_address.contact_phone +
                        "<br>" + data.destination_address.contact_email + "</p>";
                    console.log(destination);
                    var stringtable =
                        "<table class='table table-striped dt-responsive nowrap' style='border-collapse: collapse; border-spacing: 0; width: 100%;'>";

                    stringtable += "<tr><td width='50%'>" + sender + "</td><td width='50%'>" + destination +
                        "</td></tr>";

                    stringtable += "<tr><td colspan=2>PICKUP STATUS : " + data.pickup_state.toUpperCase() +
                        "</td></tr>";
                    stringtable += "<tr><td colspan=2>DELIVERY STATUS : " + data.delivery_state.toUpperCase() +
                        "</td></tr>";
                    stringtable += "</table>";
                    console.log(stringtable);
                    document.getElementById("detailshipping" + index).innerHTML = stringtable;
                })
                .catch(function(err) {
                    console.log(err);

                });
        }
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}

    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <!--table-->
@endsection
