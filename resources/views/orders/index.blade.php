@extends('layouts.master')

@section('page_header')
    Orders
@endsection
@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">Orders</h6>
                </div>
            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="tasksTable" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>user</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment Methods</th>
                            <th>Show</th>
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
                    "url": "{{ url('admin/datatables/orders') }}",
                    "type": "GET",
                },
                "order": [[0, "desc"]],
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'total', name: 'total'},
                    {data: 'status.name', name: 'status.name'},
                    {data: 'payment_method', name: 'payment_method'},
                    {data: 'operations', name: 'operations'},
                ]
            });
            return dtvar;
        }


    </script>

@endsection
