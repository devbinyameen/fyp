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
                    <li class="breadcrumb-item active" aria-current="page">My Branches</li>
                </ol>
            </nav>
            @if( isset( $branch ) )
            <h4 class="mb-1 mt-0">Branch / Edit</h4>
            @else
            <h4 class="mb-1 mt-0">Branch / Create</h4>
            @endif
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

                    <div class="row">
                        <div class="col-12">
                             @if( isset( $branch ) )
                            <form action="{{ route('admin.branches.update',$branch->id)  }}" method="post" class="parsley-examples">
                            @else
                            <form action="{{ route('admin.branches.store')  }}" method="post" class="parsley-examples">
                            @endif
                                @csrf
                                @if( isset($branch) )
                                @method('PUT')
                                @endif

                                <div class="row">

                                <div class="form-group col-md-3">
                                        <label for="company_id"> Company </label>
                                        <select autocomplete="off" type="text" id="company_id" name="company_id" parsley-trigger="change" 
                                               class="form-control @if($errors->has('company_id')) is-invalid @endif">
                                           @if(isset($branch->company_id)) 
                                           <option value="{{ old('company',$branch->company_id)  }}" >
                                            {{ old('company_id',$company->name)  }} </option>
                                           @endif
                                           @foreach( $companies as $company )
                                           <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                           @endforeach
                                       </select>
                                        @if($errors->has('company_id'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Branch Name<span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" id="name" name="name" autocomplete="off" parsley-trigger="change" required placeholder="Enter Branch name"
                                               class="form-control @if($errors->has('name')) is-invalid @endif" id="name" value="@if(isset($branch)){{ old('name',$branch->name)  }}@endif">
                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                 

                                    <div class="form-group col-md-3">
                                        <label for="phone">Phone</label>
                                        <input autocomplete="off" type="text" id="phone" name="phone" parsley-trigger="change"  placeholder="Enter company phone number"
                                               class="form-control @if($errors->has('phone')) is-invalid @endif" value="@if(isset($branch)){{ old('phone',$branch->phone) }}@endif">
                                        @if($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="city">City</label>
                                        <select autocomplete="off" type="text" id="city" name="city" parsley-trigger="change"  placeholder="Enter Opening time"
                                               class="form-control @if($errors->has('city')) is-invalid @endif">
                                           @if(isset($branch)) 
                                           <option value="{{ old('city',$branch->city)  }}" >
                                            {{ old('city',$branch->city)  }} </option>
                                           @endif
                                           <option value="Lahore"> Lahore </option>
                                           <option value="Gujranwala"> Gujranwala </option>
                                       </select>
                                        @if($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="opens">Opens</label>
                                        <input autocomplete="off" type="time" id="opens" required name="opens" parsley-trigger="change"  placeholder="Enter Opening time"
                                               class="form-control @if($errors->has('opens')) is-invalid @endif" value="@if(isset($branch)){{ old('opens',$branch->opens )  }}@endif">
                                        @if($errors->has('opens'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('opens') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="closes">Closes</label>
                                        <input autocomplete="off" type="time" id="closes" required name="closes" parsley-trigger="change"  placeholder="Enter Closing time"
                                               class="form-control @if($errors->has('closes')) is-invalid @endif" value="@if(isset($branch)){{ old('closes',$branch->closes) }}@endif">
                                        @if($errors->has('closes'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('closes') }}</strong>
                                            </span>
                                        @endif
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <textarea type="text" rows="3" id="address" name="address" parsley-trigger="change"
                                                  placeholder="Enter company address" class="form-control @if($errors->has('address')) is-invalid @endif">@if(isset($branch)) {{ old('address',$branch->address)  }} @endif</textarea>
                                        @if($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="form-group btns-div col-12">
                                         <a href="{{ url('admin/branches') }}" class="btn btn-md btn-light mr-5"> Cancel </a>
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
