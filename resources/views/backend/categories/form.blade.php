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
        .btns-div
        {
            display: flex;
            justify-content: center;
        }
        .btns-div .btn
        {
            width: 100px;
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
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Services </li>
                </ol>
            </nav>
            @if( isset( $service ) )
            <h4 class="mb-1 mt-0">Service / Edit</h4>
            @else
            <h4 class="mb-1 mt-0">Service / Create</h4>
            @endif
        </div>
    </div>
@endsection

@section('content')
  
        <service-and-scopes>
        </service-and-scopes>


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
