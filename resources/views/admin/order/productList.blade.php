@extends('admin.layouts.master')

@section('title','Product List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="{{ route('admin#orderList') }}" class="mb-3">
                <button class="btn btn-sm btn-primary">Back</button>
            </a>
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="card col-6 offset-3">
                    <div class="card-title my-2">
                        <div class="card-header text-center">
                            <h3>Order Details</h3>
                            <small class="text-warning">Delivery fees include.</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mx-1 mb-2">
                            <div class="col"><i class="fa-solid fa-user me-3"></i>Customer Name</div>
                            <div class="col">{{ strtoupper( $orderList[0]->user_name )}}</div>
                        </div>
                        <div class="row mx-1 mb-2">
                            <div class="col"><i class="fa-solid fa-barcode me-3"></i>Order Code</div>
                            <div class="col">{{ $orderList[0]->order_code }}</div>
                        </div>
                        <div class="row mx-1 mb-2">
                            <div class="col"><i class="fa-regular fa-calendar me-3"></i>Order Date</div>
                            <div class="col">{{ $orderList[0]->created_at->format('j-F-Y')}}</div>
                        </div>
                        <div class="row mx-1 mb-2">
                            <div class="col"><i class="fa-solid fa-money-check-dollar me-3"></i></i>Total</div>
                            <div class="col">{{ $order->total_price }} kyats</div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Order Id</th>
                                <!-- <th>Username</th> -->
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Order Date</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                            @foreach($orderList as $o)
                            <tr class="tr-shadow">
                                <th></th>
                                <td>{{ $o->id }}</td>
                                <!-- <td>{{ $o->user_name }}</td> -->
                                <td class="col-2"><img src="{{ asset('storage/'.$o->product_image) }}"
                                        class="img-thumbnail shadow-sm"></td>
                                <td>{{ $o->product_name }}</td>
                                <td>{{ $o->created_at->format('j-F-Y')}}</td>
                                <td>{{ $o->qty }}</td>
                                <td>{{ $o->total }} Kyats</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
                <div class="mt-3">
                    {{ $orderList->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection