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
                            <h2 class="title-1">Admin List</h2>
                        </div>
                    </div>
                </div>

                @if(session('deleteSuccess'))
                <div class="mt-5 col-6 offset-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check"></i> {{session('deleteSuccess')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-3">
                        <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span>
                        </h4>
                    </div>
                    <div class="col-3 offset-6">
                        <form action="{{ route('admin#list') }}" method="get" enctype="multipart/form-data">
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
                    <div class="ms-3 col-1 btn bg-white shadow border border-success">
                        <h4><i class="fa-solid fa-box-open"></i> ~ {{ $admin->total() }}</h4>
                    </div>
                </div>


                <div class=" table-responsive table-responsive-data2">
                    <table class=" table table-data2 text-center">
                        <thead>
                            <tr class="text-center col-12">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $a)
                            <tr class="tr-shadow">
                                <td class="d-flex justify-content-center">
                                    @if($a->image == null)
                                    @if($a->gender == 'male')
                                    <img src="{{ asset('image/defaultProfile.jpg') }}"
                                        class="img-thumbnail shadow-sm w-100">
                                    @else
                                    <img src="{{ asset('image/defaultFemaleProfile.jpg') }}"
                                        class="img-thumbnail shadow-sm w-100">
                                    @endif
                                    @else
                                    <img src="{{ asset('storage/'.$a->image) }}" class="img-thumbnail shadow-sm">
                                    @endif
                                </td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td>{{ $a->phone }}</td>
                                <td>{{ $a->address }}</td>
                                <td>{{ $a->gender }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        @if(Auth::user()->id == $a->id )

                                        @else
                                        <a href="{{ route('admin#changeRole',$a->id) }}">
                                            <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                title="change admin role">
                                                <i class="fa-brands fa-r-project"></i>
                                            </button></a>

                                        <a href="{{ route('admin#delete',$a->id) }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="fa-regular fa-trash-can me-2"></i>
                                            </button></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $admin->links() }}
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection