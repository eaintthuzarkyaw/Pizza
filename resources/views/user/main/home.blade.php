@extends('user.layouts.master')

@section('content')
<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                    price</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="d-flex bg-dark py-2 px-3 text-white align-items-center justify-content-between mb-3">
                        <label
                            style="font-weight: bold; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
                            class="fs-5" for="price-all">Categories</label>
                        <span class="badge border font-weight-normal text-white">{{count($category)}}</span>
                    </div>
                    <hr>
                    <div class="ps-2 cd-flex align-items-center justify-content-between mb-3">
                        <a href="{{ route('user#home') }}" class="text-dark ">
                            <label style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
                                for="price-1">All</label>
                        </a>
                    </div>
                    @foreach($category as $c)
                    <div class="ps-2 cd-flex align-items-center justify-content-between mb-3">
                        <a href="{{ route('user#filter', $c->id ) }}" class="text-dark">
                            <label style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
                                for="price-1">{{$c->name}}</label>
                        </a>
                    </div>
                    @endforeach
                </form>
            </div>
            <!-- Price End -->
            <div class="mt-2">
                <a href="{{ route('user#history') }}">
                    <button class="btn btn btn-warning w-100">Order<i
                            class="fa-solid fa-clipboard-list ms-2"></i></button>
                </a>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <a href="{{ route('user#cartList') }}">
                                <button type="button" class="btn position-relative bg-light">
                                    <i class="fa-solid fa-cart-shopping me-1"></i>cart
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count($cart) }}
                                    </span>
                                </button>
                            </a>

                            <a href="{{ route('user#history') }}" class="ms-3">
                                <button type="button" class="btn position-relative bg-light">
                                    <i class="fa-solid fa-clock-rotate-left  me-1"></i>history
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count($history) }}
                                    </span>
                                </button>
                            </a>
                        </div>
                        <div class="ml-2 mb-2">
                            <select name="sorting" id="sortingOption" class="form-control custom-select">
                                <option class="">Sorting</option>
                                <option value="asc">Ascending</option>
                                <option value="desc">Desceding</option>
                            </select>
                        </div>
                    </div>
                </div>

                <span class="row" id="dataList">
                    @if(count($pizza) != 0)
                    @foreach($pizza as $p)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4" id="myForm">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style="height: 200px;"
                                    src="{{ asset('storage/'.$p->image)}}">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('user#cartList') }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('user#pizzaDetails',$p->id) }}"><i
                                            class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{$p->name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{$p->price}} kyats</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p
                        class="col-md-8 offset-2 text-white text-primary fs-3 mt-5 py-2 shadow-sm border border-primary text-center">
                        There is no product list to show. <i class="fa-solid fa-store-slash ms-2"></i>
                    </p>
                    @endif

                </span>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection

@section('scriptSource')
<script>
$(document).ready(function() {
    $("#sortingOption").change(function() {
        $eventOption = $("#sortingOption").val();
        // console.log($eventOption);

        if ($eventOption == "asc") {
            $.ajax({
                type: "get",
                data: {
                    status: "asc",
                },
                url: "http://127.0.0.1:8000/user/ajax/pizzaList",
                dataType: "json",
                success: function(response) {
                    $list = "";
                    for ($i = 0; $i < response.length; $i++) {
                        // console.log(`${response[$i].name}`);
                        $list += `
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4" id="myForm">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" style="height: 200px;" src="{{ asset('storage/${response[$i].image}')}}">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${response[$i].price} kyats</h5>
                                <h6 class="text-muted ml-2"><del>25000</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                            </div>
                        </div>
                        </div>
                    </div>
                        `;
                    }
                    $("#dataList").html($list);
                },
            });
        } else if ($eventOption == "desc") {
            $.ajax({
                type: "get",
                data: {
                    status: "desc",
                },
                url: "http://127.0.0.1:8000/user/ajax/pizzaList",
                dataType: "json",
                success: function(response) {
                    $list = "";
                    for ($i = 0; $i < response.length; $i++) {
                        // console.log(`${response[$i].name}`);
                        $list += `
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4" id="myForm">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" style="height: 200px;" src="{{ asset('storage/${response[$i].image}')}}">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${response[$i].price} kyats</h5>
                                <h6 class="text-muted ml-2"><del>25000</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                            </div>
                        </div>
                        </div>
                    </div>
                        `;
                    }
                    $("#dataList").html($list);
                },
            });
        }
    });
});
</script>
@endsection