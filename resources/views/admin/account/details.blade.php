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
                        <div class="card-title">
                            <h3 class="text-center title-2">Account Info</h3>
                        </div>
                        <hr>


                        <div class="row">
                            <div class="col-3 offset-1 mt-5">
                                @if(Auth::user()->image == null)
                                @if(Auth::user()->gender == 'male')
                                <img src="{{ asset('image/defaultProfile.jpg') }}" class="img-thumbnail shadow-sm">
                                @else
                                <img src="{{ asset('image/defaultFemaleProfile.jpg') }}"
                                    class="img-thumbnail shadow-sm">
                                @endif
                                @else
                                <img src="{{asset('storage/'.Auth::user()->image)}}" />
                                @endif
                            </div>
                            <div class="col-5 offset-1">
                                <h4 class="my-3">
                                    <i class="fa-regular fa-user me-2"></i>
                                    {{ Auth::user()->name}}
                                </h4>
                                <hr>
                                <h4 class="my-3 d-flex">
                                    <i class="fa-solid fa-envelope-open-text me-2"></i>
                                    {{ Auth::user()->email}}
                                </h4>
                                <hr>
                                <h4 class="my-3">
                                    <i class="fa-solid fa-square-phone me-2"></i>
                                    {{ Auth::user()->phone}}
                                </h4>
                                <hr>
                                <h4 class="my-3">
                                    <i class="fa-solid fa-transgender me-2"></i>
                                    {{ Auth::user()->gender}}
                                </h4>
                                <hr>
                                <h4 class="my-3">
                                    <i class="fa-regular fa-address-card me-2"></i>
                                    {{ Auth::user()->address}}
                                </h4>
                                <hr>
                                <h4 class="my-3">
                                    <i class="fa-regular fa-calendar-check me-2"></i>
                                    {{ Auth::user()->created_at->format('j-F-Y') }}
                                </h4>
                                <hr>
                            </div>
                            <div class="row ">
                                <div class="col-4 offset-5 my-3">
                                    <a href="{{ route('admin#edit') }}">
                                        <button class="btn bg-dark text-white">
                                            <i class="fa-regular fa-pen-to-square me-2"></i>
                                            Edit Profile
                                        </button>
                                    </a>
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