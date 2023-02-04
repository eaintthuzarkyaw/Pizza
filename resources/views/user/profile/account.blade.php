@extends('user.layouts.master')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2 py-2">Account Profile</h3>
                        </div>
                        <hr>
                        @if(session('updateSuccess'))
                        <div class="col-6 offset-3 my-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check"></i> {{session('updateSuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('user#accountChange', Auth::user()->id )}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2 mb-4">
                                <div class="col-4 offset-1 mt-3">
                                    @if(Auth::user()->image == null)
                                    @if(Auth::user()->gender == 'male')
                                    <img src="{{ asset('image/defaultProfile.jpg') }}" class="img-thumbnail shadow-sm">
                                    @else
                                    <img src="{{ asset('image/defaultFemaleProfile.jpg') }}"
                                        class="img-thumbnail shadow-sm">
                                    @endif
                                    @else
                                    <img src="{{asset('storage/'.Auth::user()->image)}}"
                                        class="img-thumbnail shadow-sm" />
                                    @endif

                                    <div class="mt-4">
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label class="control-label">Role</label>
                                        <input id="cc-pament" name="role" value="{{ old('role',Auth::user()->role) }}"
                                            type="text" class="form-control " aria-required="true" aria-invalid="false"
                                            disabled>
                                    </div>

                                    <div class="mt-5 mb-3">
                                        <button class="btn bg-dark text-white col-12" type="submit">
                                            Update
                                            <i class="fa-solid fa-caret-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Name</label>
                                        <input id="cc-pament" name="name" value="{{ old('name',Auth::user()->name) }}"
                                            type="text" class="form-control @error('name') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter admin name...">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label">Email</label>
                                        <input id="cc-pament" name="email"
                                            value="{{ old('email',Auth::user()->email) }}" type="email"
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
                                        <input id="cc-pament" name="phone"
                                            value="{{ old('phone',Auth::user()->phone) }}" type="number"
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
                                        <select name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Choose gender...</option>
                                            <option value="male" @if(Auth::user()->gender == 'male')selected @endif
                                                >Male </option>
                                            <option value="female" @if(Auth::user()->gender == 'female') selected
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
                                        <textarea name="address"
                                            class="form-control @error('address') is-invalid @enderror" cols="10"
                                            rows="5">{{ old('address',Auth::user()->address) }}
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
@endsection