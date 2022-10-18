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
                    <li class="breadcrumb-item active" aria-current="page">Users </li>
                </ol>
            </nav>
            @if( isset( $branch ) )
            <h4 class="mb-1 mt-0">User / Edit</h4>
            @else
            <h4 class="mb-1 mt-0">Add User </h4>
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
                             @if( isset( $user ) )
                            <form action="{{ route('admin.users.update',$user->id)  }}" method="post" class="parsley-examples">
                            @else
                            <form action="{{ route('admin.users.store')  }}" method="post" class="parsley-examples">
                            @endif
                                @csrf
                                @if( isset($user) )
                                @method('PUT')
                                @endif

                                <div class="row">

                                <div class="form-group col-md-3">
                                        <label for="first_name">First Name<span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" id="first_name" name="first_name" autocomplete="off" parsley-trigger="change" required placeholder="Enter First name"
                                               class="form-control @if($errors->has('first_name')) is-invalid @endif" id="first_name" value="@if(isset($user)) {{ old('first_name',$user->first_name)  }} @endif">
                                        @if($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div> 

                                    <div class="form-group col-md-3">
                                        <label for="last_name">Last Name<span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" id="last_name" name="last_name" autocomplete="off" parsley-trigger="change" required placeholder="Enter Last name"
                                               class="form-control @if($errors->has('last_name')) is-invalid @endif" id="last_name" value="@if(isset($user)) {{ old('last_name',$user->last_name)  }} @endif">
                                        @if($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                 

                                    <div class="form-group col-md-3">
                                        <label for="phone_number">Phone</label>
                                        <input autocomplete="off" type="text" id="phone_number" name="phone_number" parsley-trigger="change"  placeholder="Enter persona phone number"
                                               class="form-control @if($errors->has('phone_number')) is-invalid @endif" value="@if(isset($user)) {{ old('phone_number',$user->phone_number) }} @endif">
                                        @if($errors->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="user_status">Status</label>
                                        <select autocomplete="off" type="text" id="user_status" name="status" parsley-trigger="change" 
                                               class="form-control @if($errors->has('status')) is-invalid @endif">
                                           @if(isset($user)) 
                                           <option value="{{ old('status',$user->status)  }}">@php if( $user->status == 1 ) echo 'Active'; else if( $user->status == 0  ) echo "In-Active"; else if( $user->status == 2 ) echo "Block"; @endphp</option>
                                           @endif
                                           <option value="1"> Active </option>
                                           <option value="2"> Block </option>
                                       </select>
                                        @if($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="cnic">CNIC</label>
                                        <input autocomplete="off" type="text" id="cnic" name="cnic" parsley-trigger="cnic"  placeholder="Enter CNIC" maxlength="13"
                                               class="form-control @if($errors->has('cnic')) is-invalid @endif" value="@if(isset($user)) {{ old('cnic',$user->cnic)  }} @endif">
                                        @if($errors->has('cnic'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cnic') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="closes">Email</label>
                                        <input autocomplete="off" type="email" id="email" name="email" parsley-trigger="change"  placeholder="Enter Email"
                                               class="form-control @if($errors->has('email')) is-invalid @endif" value="@if(isset($user)) {{ old('email',$user->email) }} @endif">
                                        @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
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
