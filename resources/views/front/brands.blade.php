@extends('front.layouts.master')

@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Brands</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Brands</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    @foreach($brands as $brand)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <a href="{{route('brand-products',$brand->id)}}">
                            <div class="card product-item border-0 mb-4">

                                <div class="card-footer text-center justify-content-between bg-light border">
                                    <span class="btn btn-sm text-dark p-0">{{$brand->name}}</span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach


                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            {{$brands->links('front.layouts.paginate')}}
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->



@endsection
