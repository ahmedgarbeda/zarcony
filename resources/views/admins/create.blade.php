@extends('layouts.master')

@section('page_header')
    Create Admin
@endsection

@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create" role="form" action="{{route('admins.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Name" required>
                            @error('name')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="email" name="email" value="{{old('email')}}" placeholder="person@something.com" required>
                            @error('email')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Mobile number: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="tel" name="mobile" value="{{old('mobile')}}" placeholder="01000000000" required>
                            @error('mobile')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="password" name="password" value="" placeholder="" required>
                            @error('password')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="password" name="password_confirmation" value="" placeholder="" required>
                            @error('password_confirmation')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save Admin</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>


@endsection

