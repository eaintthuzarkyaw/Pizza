@extends('user.layouts.master')

@section('content')
<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 offset-2 table-responsive mb-5">
            <table id="dataTable" class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <th></th>
                    <th>Date</th>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody class="align-middle">
                    @foreach($order as $o)
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle">{{ $o->created_at->format('F-j-y') }}</td>
                        <td class="align-middle">{{ $o->order_code }}</td>
                        <td class="align-middle">{{ $o->total_price }}</td>
                        <td class="align-middle">
                            @if($o->status == 0)
                            <span class="text-waring">Pending <i class="fa-solid fa-spinner ms-1"></i></span>
                            @elseif($o->status == 1)
                            <span class="text-success">Success <i class="ms-2 fa-solid fa-thumbs-up"></i> </span>
                            @elseif($o->status == 2)
                            <span class="text-danger">Reject <i
                                    class="fa-solid fa-triangle-exclamation ms-1"></i></span>
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">{{ $order->links() }}</div>
            <a href="{{ route('user#home') }}">
                <button class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-caret-left me-1"></i>back</button>
            </a>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection