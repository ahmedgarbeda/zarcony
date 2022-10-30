@extends('layouts.master')

@section('page_header')
    Brands
@endsection
@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">Brands</h6>
                </div>

                    <div class="col-lg-6">
                        <a href="{{route('brand.create')}}" class="btn btn-primary float-left" >Create Brand</a>
                    </div>
            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="tasksTable" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div>

@endsection


@section('js')
    <script>

        var dataTable = null;

        $(document).ready(function () {
            dataTable = dt();
        });

        function dt() {
            let dtvar = $('#tasksTable').DataTable({
                dom: 'lBfrtip',
                buttons: [

                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "processing": true,
                // "scrollX": true,
                // 'autoWidth': false,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('admin/datatables/brands') }}",
                    "type": "GET",
                },
                "order": [[0, "desc"]],
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'operations', name: 'operations'},
                ]
            });
            return dtvar;
        }
        function deleteRow(id)
        {
            if (confirm('are you sure you want to delete this record?')){
                $.ajax({
                    type:"post",
                    url:"{{url('admin/brand')}}/"+id,
                    data:{
                        _token:"{{csrf_token()}}",
                        _method:"delete"
                    },
                    statusCode:{
                        200: function(response){
                            alert(response.message);
                            dataTable.ajax.reload();
                        },
                        400: function (response){
                            alert(response.message);
                        }
                    }
                });
            }
        }

    </script>

@endsection
