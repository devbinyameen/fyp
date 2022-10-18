@extends('backend.layouts.vertical')


@section('css')
    <style>
        #loader {
            position: fixed;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            background: #fff;
            padding-top: 20%;
            padding-left: 45%;
        }
    </style>
      <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li> Appointments</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">All Appointments</h4>
        </div>
    </div>
@endsection

@section('content')
    <div id="loader">
        <div class="spinner-grow text-primary m-2" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="min-height: 500px;">
                <div class="card-body">

                     <div class="col-12 mb-5">
                        <a href="{{ route('admin.appointments.create') }}" class="btn btn-sm btn-outline-primary float-right"> Add Appointment </a>
                    </div>

                    @foreach (['danger', 'warning', 'success', 'info'] as $key)
                        @if(Session::has($key))
                            <div class="row">
                                <div class="offset-3 col-6">
                                    <div class="alert alert-{{ $key }} alert-dismissible fade show" role="alert">
                                        {{ Session::get($key) }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="table-responsive ">
                        <table id="shops_datatable" class="table nowrap table-hover">
                            <thead>
                            <tr>
                                <th> Appointment Number </th>
                                <th> Customer </th>
                                <th> Service </th>
                                <th> Service Charges </th>
                                <th> Appointment From </th>
                                <th> Appointment To </th>
                                <th> Status </th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->


@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loader').fadeOut('slow');

            var table = $('#shops_datatable').DataTable({
                processing: true,
                serverSide: true,
                method: 'GET',
                ajax: "{{ route('admin.appointments.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'customer.full_name', name: 'customer.full_name'},
                    {data: 'service.service_title', service_title: 'service.service_title'},
                    {data: 'service.charges', charges: 'service.name'},
                    {data: 'from_time', name: 'from_time'},
                    {data: 'to_time', name: 'to_time'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });


        });
    </script>
@endsection

@section('script-bottom')
@endsection
