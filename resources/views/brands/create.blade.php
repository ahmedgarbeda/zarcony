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
            <form role="form" action="{{route('brand.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="form-control-label">name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Title">
                            @error('name')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save Brand</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>


@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        function submitform()
        {
            var check = validate();
            if(check==true)
            {
                $('#create').submit();
            }
        }


        $('input,textarea').keyup(function(event){
            $(this).css('border',"1px solid green");
        });

        $('input,select').change(function(event){
            $(this).css('border',"1px solid green");
        });


        function validate()
        {
            var x,y,i,check=true;
            x = document.getElementsByClassName("tab-child");
            console.log($(x[1]).val().length);
            for (i = 0; i < x.length; i++)
            {
                if($(x[i]).val().length==0)
                {
                    $(x[i]).css("border","1px solid red");
                    check=false
                }
            }

            return check;

        }

    </script>
@endsection
