@extends('client.layouts.vertical')


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
                    <li class="breadcrumb-item active" aria-current="page">Shop Delieveries</li>
                </ol>
            </nav>

            <h4 class="mb-1 mt-0">Shop Delieveries / Assign Delievery</h4>
        </div>
    </div>
@endsection

@section('content')
    <div id="loader">
        <div class="spinner-grow text-primary m-2" role="shop_delievery_status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card" style="min-height: 500px;">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('admin/shop_delievery/'.$delievery->id.'/assign')  }}" method="post" class="parsley-examples">
                                @csrf


                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="rider">Delievery Boys</label>
                                        <select autocomplete="off" type="text" id="rider" name="rider" parsley-trigger="change"  class="form-control @if($errors->has('rider')) is-invalid @endif">

                                            @foreach( $riders as $rider )
                                            <option value="{{ $rider->id }}"> {{ $rider->name }} </option>
                                            @endforeach

                                        </select>

                                        @if($errors->has('rider'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rider') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                </div>



                                <div class="row mt-5">
                                    <div class="form-group btns-div col-12">
                                         <a href="{{ url('admin/shop_delieveries') }}" class="btn btn-md btn-light mr-5"> Cancel </a>
                                        <button type="submit" class="btn btn-md btn-primary "> Save </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>

            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->


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
