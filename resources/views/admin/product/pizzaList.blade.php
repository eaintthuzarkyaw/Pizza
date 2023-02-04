@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Products List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{ route('product#createPage') }}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add product
                            </button>
                        </a>
                    </div>
                </div>

                @if(session('deleteSuccess'))
                <div class="mt-5 col-5 offset-7">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check"></i> {{session('deleteSuccess')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-4">
                        <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span>
                        </h4>
                    </div>
                    <div class="col-3 offset-5">
                        <form action="{{ route('product#list') }}" method="get">
                            @csrf
                            <div class="d-flex">
                                <input type="text" name="key" class="form-control" placeholder="search..."
                                    value="{{ request('key') }}">
                                <button class=" btn bg-dark text-white" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="ms-3 col-1 btn bg-white shadow border border-secondary">
                        <h4><i class="fa-solid fa-box-open"></i> {{ $pizzas->total() }} </h4>
                    </div>
                </div>

                @if( count($pizzas) != 0)
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th class="col-3">Image</th>
                                <th class="col-3">Name</th>
                                <th class="col-1">Price</th>
                                <th class="col-1">Category</th>
                                <th class="col-1">View Count</th>
                                <th class="col-3"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pizzas as $p)
                            <tr class="tr-shadow">
                                <td style="width: 120px;">
                                    <img src="{{ asset('storage/'. $p->image ) }}" class="img-thumbnail shadow-sm">
                                </td>
                                <td class="col-3 fw-bold">{{ $p->name }}</td>
                                <td class="col-2 fw-bold" type="text">{{ $p->price }}</td>
                                <td class="col-2 fw-bold">{{ $p->category_name }}</td>
                                <td class="col-2 fw-bold"> <i class="fa-solid fa-eye me-2"></i> {{ $p->view_count }}
                                </td>
                                <td class="col-2 ">
                                    <div class="table-data-feature">
                                        <a href="{{ route('product#edit',$p->id)}}">
                                            <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                title="view">
                                                <i class="fa-solid fa-eye me-2"></i>
                                            </button></a>

                                        <a href="{{ route('product#updatePage',$p->id) }}">
                                            <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                title="edit">
                                                <i class="fa-regular fa-pen-to-square me-2"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('product#delete',$p->id) }}">
                                            <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="fa-regular fa-trash-can me-2"></i>
                                            </button></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $pizzas->links() }}
                    </div>
                </div>
                @else
                <h3 class="text-center text-secondary mt-3">There is no pizza category here!</h3>
                @endif
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection