@extends('layouts.master')

@section('page_header')
    Statistics
@endsection
@section('content')
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mb-3">
                <a>
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-man tx-60 lh-0 tx-white op-7 m-2"></i>
                            <div class="mg-r-20">
                                <p class="tx-16 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">brands</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$brands}}</p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </a>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mb-3">
                <a>
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-man tx-60 lh-0 tx-white op-7 m-2"></i>
                            <div class="mg-r-20">
                                <p class="tx-16 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">products</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$products}}</p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @foreach($orders as $one)
            <div class="col-sm-6 col-xl-3 mb-3">
                <a>
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-man tx-60 lh-0 tx-white op-7 m-2"></i>
                        <div class="mg-r-20">
                            <p class="tx-16 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">{{$one->name}} Orders</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$one->orders->count()}}</p>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
                </a>
            </div><!-- col-3 -->
            @endforeach


        </div><!-- row -->


    </div>
@endsection
