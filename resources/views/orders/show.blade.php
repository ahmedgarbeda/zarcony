@extends('layouts.master')

@section('page_header')
    Create Task
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>User</th>
                            <td>{{$order->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$order->user->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$order->status->name}}</td>
                        </tr>
                    </tbody>
                </table>

                <hr>

            <h3>Order Details</h3>
                <table class="table table-bordered">
                    <thead>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{$item->product->title}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity * $item->price}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{{$order->total}}</td>
                        </tr>
                    </tbody>
                </table>


            <hr>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="change-status" role="form" action="{{route('orders.update',$order->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-6">
                            <label class="form-control-label">Orde Stauts: <span class="tx-danger">*</span></label>
                            <select class="form-control " id="order_status_id" name="order_status_id">
                                <option selected disabled> Change Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                                <option></option>
                            </select>
                            @error('order_status_id')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Status</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>

@endsection
