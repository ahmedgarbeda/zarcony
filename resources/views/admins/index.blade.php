@extends('layouts.master')

@section('page_header')
    Admins
@endsection
@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">Admins</h6>
                </div>

                    <div class="col-lg-6">
                        <a href="{{route('admins.create')}}" class="btn btn-primary float-left" >Create Admin</a>
                    </div>
            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="tasksTable" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
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
                    "url": "{{ url('admin/datatables/admins') }}",
                    "type": "GET",
                },
                "order": [[0, "desc"]],
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
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
                    url:"{{url('admin/admins')}}/"+id,
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
