@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{ route('product#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Create Your Product</h3>
                        </div>
                        <hr>
                        <form action="{{ route('product#create') }}" enctype="multipart/form-data" method="post"
                            novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-2">Name</label>
                                <input id="cc-pament" name="pizzaName" value="{{ old('pizzaName') }}" type="text" class="form-control @error('pizzaName') is-invalid
                                @enderror" aria-required="true" aria-invalid="false" placeholder="Enter name...">
                                @error('pizzaName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-2">Category</label>
                                <select name="pizzaCategory" value="{{ old('pizzaCategory') }}" class="form-control @error('pizzaCategory') is-invalid
                                @enderror">
                                    <option value="">Choose your items</option>
                                    @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('pizzaCategory')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-2">Description</label>
                                <textarea name="pizzaDescription" class="form-control @error('pizzaDescription') is-invalid
                                @enderror" cols="30" rows="10"
                                    placeholder="Enter description...">{{ old('pizzaDescription') }}</textarea>
                                @error('pizzaDescription')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-2">Image</label>
                                <input type="file" name="pizzaImage" class="form-control @error('pizzaImage') is-invalid
                                @enderror">
                                @error('pizzaImage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-2">Price</label>
                                <input id="cc-pament" name="pizzaPrice" value="{{ old('pizzaPrice') }}" type="number"
                                    class="form-control @error('pizzaPrice') is-invalid
                                @enderror" aria-required="true" aria-invalid="false" placeholder="Enter price...">
                                @error('pizzaPrice')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-2">Waiting Time</label>
                                <input id="cc-pament" name="pizzaWaitingTime" value="{{ old('pizzaWaitingTime') }}"
                                    type="number" class="form-control @error('pizzaWaitingTime') is-invalid
                                @enderror" aria-required="true" aria-invalid="false"
                                    placeholder="Enter WaitingTime...">
                                @error('pizzaWaitingTime')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Create</span>
                                    <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                                    <i class="fa-solid fa-circle-right"></i>
                                </button>
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