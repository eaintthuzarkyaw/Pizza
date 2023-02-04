@extends('admin.layouts.master')

@section('title','Order list page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h2 class="title-1 fw-bold text-center my-2">Order List</h2>
                <form action="{{ route('admin#changeStatus') }}" method="get" class="my-4">
                    @csrf
                    <div class="input-group mb-1 mt-2">
                        <button class="btn btn-dark disabled">
                            <i class="fa-solid fa-box-open me-2"></i>{{ count($order) }}
                        </button>
                        <select name="orderStatus" class="col-2 custom-select border-dark">
                            <option value="">All</option>
                            <option value="0" @if(request('orderStatus')=='0' ) selected @endif>Pending</option>
                            <option value="1" @if(request('orderStatus')=='1' ) selected @endif>Accept</option>
                            <option value="2" @if(request('orderStatus')=='2' ) selected @endif>Reject</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th>User-ID</th>
                                <th>Username</th>
                                <th>Order Date</th>
                                <th>Order Code</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                            @foreach($order as $o)
                            <tr class="tr-shadow">
                                <input type="hidden" id="orderId" value="{{ $o->id }}">
                                <td>{{ $o->user_id }}</td>
                                <td>{{ $o->user_name }}</td>
                                <td>{{ $o->created_at->format('F/j/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin#listInfo',$o->order_code ) }}">{{ $o->order_code }}</a>
                                </td>
                                <td class="amount">{{ $o->total_price }} Kyats</td>
                                <td>
                                    <select class="statusChange form-control shadow-sm" name="status">
                                        <option value="0" style="color: warning !important;" @if($o->status == 0)
                                            selected @endif >Pending...</option>
                                        <option value="1" style="color: warning !important;" @if($o->status == 1)
                                            selected @endif >Accept</option>
                                        <option value="2" style="color: warning !important;" @if($o->status == 2)
                                            selected @endif >Reject!</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection

@section('scriptSection')
<script>
$(document).ready(function() {
    // $('#orderStatus').change(function() {
    //     $status = $('#orderStatus').val();

    //     $.ajax({
    //         type: 'get',
    //         url: 'http://127.0.0.1:8000/order/ajax/status',
    //         data: {
    //             'status': $status
    //         },
    //         dataType: 'json',
    //         success: function(response) {
    //             $list = '';
    //             for ($i = 0; $i < response.length; $i++) {

    //                 $months = ['January', 'February', 'March', 'April', 'May', 'June',
    //                     'July', 'August', 'September', 'October', 'November', 'December'
    //                 ];
    //                 $dbDate = new Date(response[$i].created_at);
    //                 $finalDate = $months[$dbDate.getMonth()] + '/' + $dbDate.getDate() +
    //                     '/' + $dbDate.getYear();

    //                 if (response[$i].status == 0) {
    //                     $statusMessage = `
    //                     <select name="status" class="form-control statusChange border border-light shadow-sm">
    //                                     <option value="0" selected >Pending...</option>
    //                                     <option value="1">Accept</option>
    //                                     <option value="2">Reject!</option>
    //                                 </select>
    //                     `;
    //                 } else if (response[$i].status == 1) {
    //                     $statusMessage = `
    //                     <select name="status" class="form-control statusChange border border-light shadow-sm">
    //                                     <option value="0">Pending...</option>
    //                                     <option value="1" selected >Accept~</option>
    //                                     <option value="2">Reject!</option>
    //                                 </select>
    //                     `;
    //                 } else if (response[$i].status == 2) {
    //                     $statusMessage = `
    //                     <select name="status" class="form-control statusChange border border-light shadow-sm">
    //                                     <option value="0">Pending...</option>
    //                                     <option value="1">Accept~</option>
    //                                     <option value="2" selected >Reject!</option>
    //                                 </select>
    //                     `;
    //                 }

    //                 $list += `
    //                 <tr class="tr-shadow">
    //                         <input type="hidden" id="orderId" value="${response[$i].id}">
    //                             <td> ${response[$i].user_id} </td>
    //                             <td> ${response[$i].user_name}</td>
    //                             <td> ${$finalDate}</td>
    //                             <td> ${response[$i].order_code } </td>
    //                             <td> ${response[$i].total_price }  Kyats</td>
    //                             <td> ${$statusMessage}</td>
    //                         </tr>
    //                 `;
    //             }
    //             $('#dataList').html($list);
    //         }
    //     })
    // })

    //status change
    $('.statusChange').change(function() {
        $currentStatus = $(this).val();
        $parentNode = $(this).parents('tr');
        $orderID = $parentNode.find('#orderId').val();

        $data = {
            'status': $currentStatus,
            'orderId': $orderID
        };


        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/order/ajax/change/status',
            data: $data,
            dataType: 'json',
        })
    })

});
</script>
@endsection