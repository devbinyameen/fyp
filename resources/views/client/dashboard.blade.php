@extends('client.layouts.vertical')

@section('css')
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0"> Client Dashboard </h4>
    </div>
    <div class="col-sm-8 col-xl-6">

    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                            Branches
                        </span>
                        <h2 class="mb-0"> {{ $branches_count }} </h2>
                    </div>
                    <div class="align-self-center">
                        <div id="today-revenue-chart" class="apex-charts"></div>
                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                            Total Deliveries
                        </span>
                        <h2 class="mb-0"> {{ $all_deliveries_count }} </h2>
                    </div>
                    <div class="align-self-center">
                        <div id="today-product-sold-chart" class="apex-charts"></div>
                        <!-- <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i>
                            5.05%</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                            Pending Deliveries
                        </span>
                        <h2 class="mb-0"> {{ $pending_deliveries_count }} </h2>
                    </div>
                    <div class="align-self-center">
                        <div id="today-new-customer-chart" class="apex-charts"></div>
                        <!-- <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i>
                            25.16%</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                            Delivered Delieveries
                        </span>
                        <h2 class="mb-0"> {{ $delivered_deliveries_count }} </h2>
                    </div>
                    <div class="align-self-center">
                        <div id="today-new-visitors-chart" class="apex-charts"></div>
                        <!-- <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i>
                            5.05%</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end row -->
@endsection

@section('script')
<!-- optional plugins -->
<script src="{{ URL::asset('public/assets/libs/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- init js -->
<script src="{{ URL::asset('public/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
