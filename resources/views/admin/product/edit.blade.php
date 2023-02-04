@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="row">
        <div class="col-6 offset-3 my-3">
            @if(session('updateSuccess'))
            <div class="">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> {{session('updateSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <!-- <a href="{{ route('product#list') }}"> -->
                        <i class="fa-solid fa-circle-chevron-left text-dark" onclick="history.back()"></i>
                        <!-- </a> -->
                        <div class="card-title">
                            <h3 class="pb-2 text-center title-2">Pizza Details</h3>
                        </div>
                        <hr>


                        <div class="row">
                            <div class="col-4 offset-1 mt-3">
                                <img src="{{ asset('storage/'.$pizza->image )}}" class="mb-2 img-thumbnail shadow-sm" />
                                <div class="mt-5 text-center">
                                    <i class="fa-solid fa-box-open me-2"></i> ~ {{ $pizza->category_name }}
                                </div>
                                <hr>
                                <div class="text-center">
                                    <i class="fa-solid fa-eye me-2"></i> ~
                                    {{ $pizza->view_count }}
                                </div>
                                <hr>
                            </div>
                            <div class="col-5 offset-1">
                                <div class="my-3 fs-6">
                                    <i class="fa-regular fa-paste me-2 "></i>
                                    {{ $pizza->name }}
                                </div>
                                <hr>
                                <div class="my-3 fs-6">
                                    <i class="fa-solid fa-hand-holding-dollar me-2"></i>
                                    {{ $pizza->price }}
                                </div>
                                <hr>

                                <div class="my-3 fs-6">
                                    <i class="fa-regular fa-hourglass-half me-2"></i>
                                    {{ $pizza->waiting_time }}
                                </div>
                                <hr>
                                <div class="my-3 fs-6 d-flex">
                                    <i class="fa-regular fa-file-lines me-2"></i>
                                    <div class="ms-1">
                                        {{ $pizza->description }}
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3 fs-6">
                                    <i class="fa-regular fa-calendar-check me-2"></i>
                                    {{ $pizza->created_at->format('j-F-Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection