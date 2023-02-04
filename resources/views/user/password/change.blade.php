@extends('user.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change Password</h3>
                                    </div>
                                    <hr>

                                    @if(session('changeSuccess'))
                                    <div class="col-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fa-solid fa-check"></i> {{session('changeSuccess')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    @endif

                                    @if(session('notMatch'))
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                            {{session('notMatch')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    @endif

                                    <form action="{{ route('user#changePasswordPage') }}" method="post"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-2">Old Password</label>
                                            <input id="cc-pament" name="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid
                                @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Enter Old Password...">

                                            @error('oldPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-2">New Password</label>
                                            <input id="cc-pament" name="newPassword" type="password" class="form-control @error('newPassword') is-invalid
                                @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Enter New Password...">
                                            @error('newPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-2">Confirm Password</label>
                                            <input id="cc-pament" name="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid
                                @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Enter Confirm Password...">
                                            @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3 text-center">
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg bg-dark text-white btn-block">
                                                <i class="fa-solid fa-key me-2"></i>
                                                <span id="payment-button-amount">Change Password</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection