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
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create" role="form" action="{{route('product.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="title" value="{{old('title')}}" placeholder="Title" required>
                            @error('title')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 " id="brand_id" name="brand_id" required>
                                <option selected disabled>search and choose brand</option>
{{--                                @foreach($users as $user)--}}
{{--                                    <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            @error('brand_id')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">SKU: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="sku" value="{{old('sku')}}" placeholder="SKU" required>
                            @error('sku')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="number" name="price" value="{{old('price')}}" placeholder="Price" required>
                            @error('price')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                            <textarea rows="10" name="details" class="form-control" placeholder="Details" required>{{old('details')}}</textarea>
                            @error('details')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save Product</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>




        {{--$('#user_id').select2(select2Ajax('{{ route('get-users') }}'))--}}
        $('#brand_id').select2({
            ajax: {
                url: '{{route('get-brands')}}',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }

                    // Query parameters will be ?search=[term]&page=[page]
                    return query;
                },
                processResults: function (data) {

                    return {
                        results: data[0]
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
    </script>
@endsection
