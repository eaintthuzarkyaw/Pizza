@extends('user.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('user#contact') }}" method="post" novalidate="novalidate">
            @csrf

            @if(session('success'))
            <div class="col-6 offset-3 mb-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-title">
                    <div class="card-header text-center">
                        <h3 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Contact Us,
                            <q>Admin Team</q>
                        </h3>
                        <!-- <small class="text-center text-warning">Admin Team</small> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center mt-2">
                            <img src="{{ asset('image/contact.jpg') }}">
                        </div>
                        <div class="col mt-2">
                            <div class="mb-2">
                                <label for="">Name</label>
                                <input type="text" name="name"
                                    class="form-control  @error('name') is-invalid @enderror rounded"
                                    placeholder="Enter your name...">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Email</label>
                                <input type="email" name="email"
                                    class="form-control  @error('email') is-invalid @enderror"
                                    placeholder="Enter your email...">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Message</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                    cols="30" rows="8" placeholder="Enter your message..."></textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-warning col-1 float-end me-4">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection