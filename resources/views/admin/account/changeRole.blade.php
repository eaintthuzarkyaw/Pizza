@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <a href="{{ route('admin#list') }}">
                        <i class="fa-solid fa-circle-chevron-left text-dark pt-3 ms-3"></i>
                    </a>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2 pb-2">Change Role</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin#change', $account->id )}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2 mb-4">
                                <div class="col-4 offset-1 mt-3">
                                    @if($account->image == null)
                                    @if($account->gender == 'male')
                                    <img src="{{ asset('image/defaultProfile.jpg') }}" class="img-thumbnail shadow-sm">
                                    @else
                                    <img src="{{ asset('image/defaultFemaleProfile.jpg') }}"
                                        class="img-thumbnail shadow-sm">
                                    @endif
                                    @else
                                    <img src="{{asset('storage/'.$account->image)}}" />
                                    @endif

                                    <div class="form-group mt-3">
                                        <label class="control-label">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="admin" @if($account->role == 'admin') selected @endif >Admin
                                            </option>
                                            <option value="user" @if($account->role == 'user') selected @endif >User
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mt-5 mb-3">
                                        <button class="btn bg-dark text-white col-12" type="submit">
                                            Change
                                            <i class="fa-solid fa-caret-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row col-6 mt-2">
                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Name</label>
                                        <input id="cc-pament" name="name" disabled
                                            value="{{ old('name',$account->name) }}" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter admin name...">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Email</label>
                                        <input id="cc-pament" name="email" disabled
                                            value="{{ old('email',$account->email) }}" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Enter admin email...">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Phone</label>
                                        <input id="cc-pament" name="phone" disabled
                                            value="{{ old('phone',$account->phone) }}" type="number"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Enter admin phone number...">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Gender</label>
                                        <select name="gender" disabled
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Choose gender...</option>
                                            <option value="male" @if($account->gender == 'male')selected @endif
                                                >Male </option>
                                            <option value="female" @if($account->gender == 'female') selected
                                                @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Address</label>
                                        <textarea name="address" disabled
                                            class="form-control @error('address') is-invalid @enderror" cols="10"
                                            rows="5">{{ old('address',$account->address) }}
                                        </textarea>
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection