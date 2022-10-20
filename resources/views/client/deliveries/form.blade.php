@extends('client.layouts.vertical')


@section('breadcrumb')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Delieveries</li>
                </ol>
            </nav>
            @if( isset( $delivery ) )
            <h4 class="mb-1 mt-0">Edit Delievery </h4>
            @else
            <h4 class="mb-1 mt-0">Add Delievery </h4>
            @endif
        </div>
    </div>
@endsection

@section('content')


@if( isset( $delivery ) )
        <edit-delivery
            :service_cities="{{ $service_cities }}"
            :services="{{ $services }}"
            :branches="{{ $branches }}"
            :user="{{ \Auth::user() }}"
            :delivery_prop="{{ $delivery }}"
        >
        </edit-delivery>

        @else
        <add-delivery
            :service_cities="{{ $service_cities }}"
            :services="{{ $services }}"
            :branches="{{ $branches }}"
            :user="{{ \Auth::user() }}"
        >
        </add-delivery>
@endif


@endsection

@section('script')
    <script src="https://cdn.tiny.cloud/1/k8aaemajh4grijw0jczycetgt4ddfipsgptm84u9jhdoxp8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
        $(document).ready(function () {
            $('#loader').fadeOut('slow');

            tinymce.init({
                selector: 'textarea#editor',
                menubar: false
            });

        });
    </script>
@endsection

@section('script-bottom')
@endsection
