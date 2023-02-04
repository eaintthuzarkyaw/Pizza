@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('product#list') }}">
                            <i class="fa-solid fa-circle-chevron-left text-dark"></i>
                        </a>
                        <div class="card-title">
                            <h3 class="text-center title-2 pb-3">Update Pizza</h3>
                        </div>
                        <hr>
                        <form action="{{ route('product#update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-4 offset-1 mt-4">
                                    <input type="hidden" name="pizzaId" value="{{ $pizza->id }}">
                                    <img src="{{ asset('storage/'.$pizza->image) }}"
                                        class="mb-4 shadow-sm img-thumbnail" />
                                    <div class="my-3">
                                        <input type="file" name="pizzaImage"
                                            class="form-control @error('pizzaImage') is-invalid @enderror">
                                        @error('pizzaImage')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <button class="btn btn-sm col-12 text-center my-3" disabled>
                                            <span class="control-label fs-6 fs-6">View Count</span>
                                            <i class="fa-solid fa-eye mx-2"></i> ~
                                            {{ old('viewCount', $pizza->view_count )}}
                                        </button>
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn bg-dark text-white col-12" type="submit">
                                            Update
                                            <i class="fa-solid fa-caret-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-6 ms-2 mt-2">
                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label fs-6">Name</label>
                                        <input id="cc-pament" name="pizzaName"
                                            value="{{ old('pizzaName',$pizza->name) }}" type="text"
                                            class="form-control @error('pizzaName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter pizza name...">
                                        @error('pizzaName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label fs-6">Category</label>
                                        <select name="pizzaCategory"
                                            class="form-control @error('pizzaCategory') is-invalid @enderror">
                                            <option value="">Choose pizza category...</option>
                                            @foreach($category as $c)
                                            <option value="{{ $c->id }}" @if($pizza->category_id == $c->id) selected
                                                @endif> {{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('pizzaCategory')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label fs-6">Description</label>
                                        <textarea name="pizzaDescription" placeholder="Enter description..."
                                            class="form-control @error('pizzaDescription') is-invalid @enderror"
                                            cols="15" rows="8">{{ old('pizzaDescription',$pizza->description) }}
                                        </textarea>
                                        @error('pizzaDescription')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label fs-6">Waiting Time</label>
                                        <input id="cc-pament" name="pizzaWaitingTime"
                                            value="{{ old('pizzaWaitingTime',$pizza->waiting_time) }}" type="number"
                                            class="form-control @error('pizzaWaitingTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Enter Waiting Time...">
                                        @error('pizzaWaitingTime')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2 ms-3">
                                        <label class="control-label fs-6">Price</label>
                                        <input id="cc-pament" name="pizzaPrice"
                                            value="{{ old('pizzaPrice',$pizza->price) }}" type="number"
                                            class="form-control @error('pizzaPrice') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Enter pizza price...">
                                        @error('pizzaPrice')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 ms-3">
                                        <label class="control-label fs-6">Created Date</label>
                                        <input id="cc-pament" name="created_at"
                                            value="{{ $pizza->created_at->format('j-F-Y') }}" type="text"
                                            class="form-control " aria-required="true" aria-invalid="false" disabled>
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