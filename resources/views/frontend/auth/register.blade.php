@extends('frontend.layouts.footerlessTemplate')

@include('frontend.pages.includes.header')

<style>
    .dark .menu-link { color: var(--themecolor) !important; }
</style>
@section('content')

    <section id="content">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 p-5">

                    @if(session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                    <br>@endif
                    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>
                    <br>@endif

                </div>
            </div>

                <form method="POST" action="{{ route('frontend.auth.company_register.submit') }}" class="authentication-form row">
                    @csrf

                    <div class="col-lg-12">
                        <h3> Register yourself </h3>
                    </div>

                    <div class="col-lg-12">
                        <h4> Personal Information </h4>
                    </div>                    

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="first_name">First Name</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="first_name" autocomplete="off" value="{{ old('first_name')}}"
                                    class="form-control @if($errors->has('first_name')) is-invalid @endif"
                                    id="first_name" placeholder="Enter your First Name" />

                            @if($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="last_name">Last Name</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="last_name" autocomplete="off" value="{{ old('last_name')}}"
                                    class="form-control @if($errors->has('last_name')) is-invalid @endif"
                                    id="last_name" placeholder="Enter your Last Name" />

                            @if($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="email">Email Address</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                            </div>
                            <input type="email"
                                    name="email" autocomplete="off" value="{{ old('email')}}"
                                    class="form-control @if($errors->has('email')) is-invalid @endif"
                                    id="email" placeholder="hello@dncourier.com" />

                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="cnic"> CNIC </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="cnic" autocomplete="off" value="{{ old('cnic')}}"
                                    class="form-control @if($errors->has('cnic')) is-invalid @endif"
                                    id="cnic" placeholder="12345-1234567-1" />

                            @if($errors->has('cnic'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cnic') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="mobile_number"> Mobile Number </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="mobile_number" autocomplete="off" value="{{ old('mobile_number')}}"
                                    class="form-control @if($errors->has('mobile_number')) is-invalid @endif"
                                    id="mobile_number" placeholder="Enter Personal Mobile Number" />

                            @if($errors->has('mobile_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                            </div>
                            <input type="password"
                                    name="password" autocomplete="off" value="{{ old('password')}}"
                                    class="form-control @if($errors->has('password')) is-invalid @endif"
                                    id="password" placeholder="Enter your password" />

                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="confirm_password">Re-Password</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                            </div>
                            <input type="password"
                                    name="confirm_password" autocomplete="off" value="{{ old('confirm_password')}}"
                                    class="form-control @if($errors->has('confirm_password')) is-invalid @endif"
                                    id="confirm_password" placeholder="Confirm your password" />

                            @if($errors->has('confirm_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 mt-5">
                        <h4> Business Information </h4>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="company"> Company </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-building"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="company" autocomplete="off" value="{{ old('company')}}"
                                    class="form-control @if($errors->has('company')) is-invalid @endif"
                                    id="company" placeholder="Day Night Courier" />

                            @if($errors->has('company'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="company_email"> Company Email </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                            </div>
                            <input type="email"
                                    name="company_email" autocomplete="off" value="{{ old('company_email')}}"
                                    class="form-control @if($errors->has('company_email')) is-invalid @endif"
                                    id="company_email" placeholder="company@dncourier.com" />

                            @if($errors->has('company_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="company_phone"> Company Phone </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="company_phone" autocomplete="off" value="{{ old('company_phone')}}"
                                    class="form-control @if($errors->has('company_phone')) is-invalid @endif"
                                    id="company_phone" placeholder="0300-0000000" />

                            @if($errors->has('company_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group col-lg-6">
                        <label class="form-control-label" for="NTN"> NTN / GST / PSTN </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </span>
                            </div>
                            <input type="text"
                                    name="NTN" autocomplete="off" value="{{ old('NTN')}}"
                                    class="form-control @if($errors->has('NTN')) is-invalid @endif"
                                    id="NTN" placeholder="Enter NTN / GST / PSTN Number" />

                            @if($errors->has('NTN'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('NTN') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-lg-12">
                        <label class="form-control-label" for="company_address"> Address </label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-location-arrow"></i>
                                    </span>
                            </div>
                            <textarea type="text"
                                    name="company_address" autocomplete="off"
                                    class="form-control @if($errors->has('company_address')) is-invalid @endif"
                                    id="company_address" placeholder="Enter Company Full Address" />{{ old('company_address') }}</textarea>

                            @if($errors->has('company_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group my-0 text-center">
                        <button class="button button-rounded btn-block" type="submit"> Register </button>
                    </div>  

                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? 
                        <a href="{{ url('login') }}" class="text-primary font-weight-bold ml-1">Login Up</a></p>
                    </div>
                </form>

                    <!-- <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Or</span>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="" class="btn btn-white"><i
                                    class='uil uil-google icon-google mr-2'></i>With Google</a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="" class="btn btn-white"><i
                                    class='uil uil-facebook mr-2 icon-fb'></i>With Facebook</a>
                        </div>
                    </div> -->
                

            <!-- end row -->
            </div>


        </div>
        <!-- end container -->
    </section>
    <!-- end page -->


    <script src="https://use.fontawesome.com/3f7c8758bb.js"></script>
@endsection
