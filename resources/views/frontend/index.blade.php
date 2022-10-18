@extends('frontend.layouts.main_template')

@section('content')

    <!-- Including header -->
    @include('frontend.pages.includes.main_header')

    <!-- Slider
		============================================= -->
    <section id="slider" class="slider-element bg-color" style="height: auto; padding: 60px 0; background: url({{ asset('front/movers/images/bg-2.png') }}) no-repeat center center / 100% 100%;">

        <div class="container" style="z-index: 2">
            <div class="center">
                <h2 class="text-white h2 font-weight-semibold mb-2">Welcome to the Appointment System.</h2>
                <p class="text-white-50"> Appointment with your trust. </p>
            </div>

{{--            <div class="row justify-content-end">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <ul class="nav nav-tabs nav-justified flex-column border-bottom-0 flex-md-row bg-color mt-4" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link py-3 active" id="home-moving-tab" data-toggle="tab" href="#home-moving" role="tab" aria-controls="home-moving" aria-selected="true">Same <br/>Day</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link py-3" id="office-moving-tab" data-toggle="tab" href="#office-moving" role="tab" aria-controls="office-moving" aria-selected="false">Choose <br/>Time</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link py-3" id="others-moving-tab" data-toggle="tab" href="#others-moving" role="tab" aria-controls="others-moving" aria-selected="false">Overnight Moving</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link py-3" id="others-moving-tab" data-toggle="tab" href="#sasta-cargo" role="tab" aria-controls="others-moving" aria-selected="false">Sasta <br/>Cargo</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">--}}
{{--                        <div class="tab-pane fade show active" id="home-moving" role="tabpanel" aria-labelledby="home-moving-tab">--}}
{{--                            <p class="mb-4">We are here to move your shipment within city and between cities same day.</p>--}}
{{--                            <div class="form-widget">--}}
{{--                                <div class="form-result"></div>--}}
{{--                                <form class="row home-moving-form position-relative mb-0" action="include/form.php" method="post" enctype="multipart/form-data">--}}
{{--                                    <div class="form-process">--}}
{{--                                        <div class="css3-spinner">--}}
{{--                                            <div class="css3-spinner-scaler"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="home-moving-form-location-from" id="home-moving-form-location-from" class="form-control required" value="" placeholder="Sender Name">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="home-moving-form-location-to" id="home-moving-form-location-to" class="form-control required" value="" placeholder="Reciever Name">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="home-moving-form-name" id="home-moving-form-name" class="form-control required" value="" placeholder="Sender Cell Number">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="home-moving-form-name" id="home-moving-form-name" class="form-control required" value="" placeholder="Reciever Cell Number">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><img src="http://www.Appointment Systemourier.com/public/front/movers/images/baggage.png" height="18" alt="baggage Icon"></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="home-moving-form-phone" id="home-moving-form-phone" class="form-control required" value="" placeholder="Weight">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-truck1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <select class="form-control required" name="" id="" value="">--}}
{{--                                            <option>Select City</option>--}}
{{--                                            <option value="Lahore">Lahore</option>--}}
{{--                                            <option value="Gujranwala">Gujranwala</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <textarea type="text" rows="3" name="home-moving-form-email" id="home-moving-form-email" class="form-control required" value="" placeholder="Sender Address"></textarea>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <textarea type="text" rows="3" name="home-moving-form-email" id="home-moving-form-email" class="form-control required" value="" placeholder="Reciever Address"></textarea>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12">--}}
{{--                                        <button type="submit" name="home-moving-form-submit" class="btn bg-color text-white font-weight-medium btn-block py-2 mt-2">Contact Us</button>--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="prefix" value="home-moving-form-">--}}
{{--                                    <input type="hidden" name="subject" value="Home Moving Request">--}}
{{--                                    <input type="hidden" name="html_title" value="Home Moving">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="office-moving" role="tabpanel" aria-labelledby="office-moving-tab">--}}
{{--                            <p class="mb-4">Share your Office Shifting details by Filling out an Easy Form. Get Free Quotes from Verified Packers &amp; Movers Instantly.</p>--}}
{{--                            <div class="form-widget">--}}
{{--                                <div class="form-result"></div>--}}
{{--                                <form class="row office-moving-form position-relative mb-0" action="include/form.php" method="post" enctype="multipart/form-data">--}}
{{--                                    <div class="form-process">--}}
{{--                                        <div class="css3-spinner">--}}
{{--                                            <div class="css3-spinner-scaler"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-truck1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="office-moving-form-location-from" id="office-moving-form-location-from" class="form-control required" value="" placeholder="Location From">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="office-moving-form-location-to" id="office-moving-form-location-to" class="form-control required" value="" placeholder="Location To">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="office-moving-form-name" id="office-moving-form-name" class="form-control required" value="" placeholder="Your Full Name">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-envelope"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="email" name="office-moving-form-email" id="office-moving-form-email" class="form-control required" value="" placeholder="Your Email">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="office-moving-form-phone" id="office-moving-form-phone" class="form-control required" value="" placeholder="Your Phone Number">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-calendar"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" class="form-control home-date required" name="office-moving-form-date" id="office-moving-form-date" value="" placeholder="Your Date">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12 d-none">--}}
{{--                                        <input type="text" id="office-moving-form-botcheck" name="office-moving-form-botcheck" value="" />--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12">--}}
{{--                                        <button type="submit" name="office-moving-form-submit" class="btn bg-color text-white font-weight-medium btn-block py-2 mt-2">Contact Us</button>--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="prefix" value="office-moving-form-">--}}
{{--                                    <input type="hidden" name="subject" value="Office Moving Request">--}}
{{--                                    <input type="hidden" name="html_title" value="Office Moving">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="others-moving" role="tabpanel" aria-labelledby="others-moving-tab">--}}
{{--                            <div class="form-widget">--}}
{{--                                <div class="form-result"></div>--}}
{{--                                <form class="row others-moving-form position-relative mb-0" action="include/form.php" method="post" enctype="multipart/form-data">--}}
{{--                                    <div class="form-process">--}}
{{--                                        <div class="css3-spinner">--}}
{{--                                            <div class="css3-spinner-scaler"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><img src="{{ asset('front/movers/images/baggage.png') }}" height="18" alt="baggage Icon"></span>--}}
{{--                                        </div>--}}
{{--                                        <select class="required custom-select" name="others-moving-form-service" id="others-moving-form-service">--}}
{{--                                            <option value="" disabled selected>-- Select Your Service --</option>--}}
{{--                                            <option value="International Moving">International Moving</option>--}}
{{--                                            <option value="Pet Moving">Pet Moving</option>--}}
{{--                                            <option value="Car Moving">Car Moving</option>--}}
{{--                                            <option value="Hire Mover Truck">Hire Mover Truck</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-social-dropbox"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-item" id="others-moving-form-item" class="form-control required" value="" placeholder="Your Item">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text text-muted bg-transparent"><i class="icon-user-circle1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <select class="required custom-select" name="others-moving-form-movers" id="others-moving-form-movers">--}}
{{--                                            <option value="" disabled selected>-- Select Movers --</option>--}}
{{--                                            <option value="1">1</option>--}}
{{--                                            <option value="2">2</option>--}}
{{--                                            <option value="3">3</option>--}}
{{--                                            <option value="4">4</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-truck1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-location-from" id="others-moving-form-location-from" class="form-control required" value="" placeholder="Location From">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-location-to" id="others-moving-form-location-to" class="form-control required" value="" placeholder="Location To">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-name" id="others-moving-form-name" class="form-control required" value="" placeholder="Your Full Name">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-envelope"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="email" name="others-moving-form-email" id="others-moving-form-email" class="form-control required" value="" placeholder="Your Email">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-phone" id="others-moving-form-phone" class="form-control required" value="" placeholder="Your Phone Number">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-calendar"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" class="form-control home-date required" name="others-moving-form-date" id="others-moving-form-date" value="" placeholder="Your Date">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12 d-none">--}}
{{--                                        <input type="text" id="others-moving-form-botcheck" name="others-moving-form-botcheck" value="" />--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12">--}}
{{--                                        <button type="submit" name="others-moving-form-submit" class="btn bg-color text-white font-weight-medium btn-block py-2 mt-2">Contact Us</button>--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="prefix" value="others-moving-form-">--}}
{{--                                    <input type="hidden" name="subject" value="Others Service Request">--}}
{{--                                    <input type="hidden" name="html_title" value="Others Service">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="sasta-cargo" role="tabpanel" aria-labelledby="others-moving-tab">--}}
{{--                            <div class="form-widget">--}}
{{--                                <div class="form-result"></div>--}}
{{--                                <form class="row others-moving-form position-relative mb-0" action="include/form.php" method="post" enctype="multipart/form-data">--}}
{{--                                    <div class="form-process">--}}
{{--                                        <div class="css3-spinner">--}}
{{--                                            <div class="css3-spinner-scaler"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><img src="{{ asset('front/movers/images/baggage.png') }}" height="18" alt="baggage Icon"></span>--}}
{{--                                        </div>--}}
{{--                                        <select class="required custom-select" name="others-moving-form-service" id="others-moving-form-service">--}}
{{--                                            <option value="" disabled selected>-- Select Your Service --</option>--}}
{{--                                            <option value="International Moving">International Moving</option>--}}
{{--                                            <option value="Pet Moving">Pet Moving</option>--}}
{{--                                            <option value="Car Moving">Car Moving</option>--}}
{{--                                            <option value="Hire Mover Truck">Hire Mover Truck</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-social-dropbox"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-item" id="others-moving-form-item" class="form-control required" value="" placeholder="Your Item">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text text-muted bg-transparent"><i class="icon-user-circle1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <select class="required custom-select" name="others-moving-form-movers" id="others-moving-form-movers">--}}
{{--                                            <option value="" disabled selected>-- Select Movers --</option>--}}
{{--                                            <option value="1">1</option>--}}
{{--                                            <option value="2">2</option>--}}
{{--                                            <option value="3">3</option>--}}
{{--                                            <option value="4">4</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-truck1"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-location-from" id="others-moving-form-location-from" class="form-control required" value="" placeholder="Location From">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-location-to" id="others-moving-form-location-to" class="form-control required" value="" placeholder="Location To">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-name" id="others-moving-form-name" class="form-control required" value="" placeholder="Your Full Name">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-envelope"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="email" name="others-moving-form-email" id="others-moving-form-email" class="form-control required" value="" placeholder="Your Email">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="others-moving-form-phone" id="others-moving-form-phone" class="form-control required" value="" placeholder="Your Phone Number">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-6 input-group form-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text bg-transparent"><i class="icon-line2-calendar"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" class="form-control home-date required" name="others-moving-form-date" id="others-moving-form-date" value="" placeholder="Your Date">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12 d-none">--}}
{{--                                        <input type="text" id="others-moving-form-botcheck" name="others-moving-form-botcheck" value="" />--}}
{{--                                    </div>--}}

{{--                                    <div class="col-12">--}}
{{--                                        <button type="submit" name="others-moving-form-submit" class="btn bg-color text-white font-weight-medium btn-block py-2 mt-2">Contact Us</button>--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="prefix" value="others-moving-form-">--}}
{{--                                    <input type="hidden" name="subject" value="Others Service Request">--}}
{{--                                    <input type="hidden" name="html_title" value="Others Service">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 d-none d-lg-flex flex-wrap justify-content-center">--}}
{{--                                                <img src="{{ asset('overs/images/slider/1.png') }}" alt="Image 1" class="d-flex align-self-end ml-5 mt-3">--}}
{{--                                                <small><a class="text-black-50" target="_blank" href="https://icons8.com" style="opacity: .4"><u>illustration by Ouch.pics</u></a></small>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>

        {{--			<div class="svg-separator">--}}
        {{--				<div>--}}
        {{--					<svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 1600 100" data-height="100">--}}
        {{--						<path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96--}}
        {{--						C979.5,96,980,56,1040,56z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8 c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8 c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2 c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8 c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6--}}
        {{--						z"></path>--}}
        {{--						<path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4 C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1 c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8 c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8 c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1 c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13 c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11 C1669.9,96,1684.8,96,1692.3,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z"></path>--}}
        {{--						<path style="fill: rgb(255, 255, 255);" d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z"></path>--}}
        {{--					</svg>--}}
        {{--					<div class="bg-white" style="height: 150px"></div>--}}
        {{--				</div>--}}
        {{--			</div>--}}

    </section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap pb-0">

            <div class="container clearfix">

                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 center">
                        <div class="heading-block">
                            <h3 class="nott mb-3 font-weight-semibold ls0">How Appointment System Boost your Business.</h3>
                            <span class="text-black-50">Appointment System will take your business at next level, Lets join us we will help you book appointment and save your day.</span>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <img src="{{ asset('front/movers/images/others/4.png') }}" alt="Image 1">
                            </div>
                            <div class="col-sm-6">
                                <h3>We Commit Fastest Booking Ever.</h3>
                                <p class="mb-2">Now booking is on time choice, just make a wish Appointment System help you to book that wish.</p>
                            </div>
                        </div>
                        <div class="row align-items-center mt-5">
                            <div class="col-sm-6">
                                <h3>Easiest Business with Appointment System, we give best.</h3>
                                <p class="mb-2">Appointment System give best booking solution by giving huge flexibility you can achieve when you ready.</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('front/movers/images/others/1.png') }}" alt="Image 1">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{--                End of Container--}}

            <div class="clear"></div>


            <div class="section section-features bg-transparent mt-0 p-0 clearfix">
                <div class="container clearfix">
                    <div class="row col-mb-50 col-mb-lg-80">
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4" style="background-image: url({{ asset('front/movers/images/featured-img/1.jpg') }});">
                                    <i class="icon-line2-home"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="font-weight-semibold">Official documents moving</h3>
                                    <p class="text-muted">
                                        We move official documents with full safety and security by giving following options :
                                        <br>1- By Hand Shipment
                                        <br>2- Hold for collection

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4" style="background-image: url({{ asset('front/movers/images/featured-img/2.jpg') }});">
                                    <i class="icon-line2-globe"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="font-weight-semibold">International  Moving.</h3>
                                    <p class="text-muted">We deliver all over the globe in limited time and without any hidden charges with 100% security and privacy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box media-box">
                                <div class="fbox-icon position-relative mb-4" style="background-image: url({{ asset('front/movers/images/featured-img/3.jpg') }});">
                                    <i class="icon-truck1"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3 class="font-weight-semibold">COD (cash on booking).</h3>
                                    <p class="text-muted">We offer Cash on Delivery option in which you will pay charges on booking plus we will remove your burden by neglecting security fee.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="clear"></div>

            <div class="section-map clearfix bottommargin-lg topmargin-lg">
                {{--					<div class="container">--}}
                {{--						<img src="{{ asset('front/movers/images/map.png') }}" alt="Map Image" class="img-fluid map-image">--}}
                {{--						<div class="map-title">--}}
                {{--							<h2 class="center">More than 21 Countries included in Our Network. Some of Our Most Popular Countries</h2>--}}
                {{--							<div class="d-flex justify-content-center">--}}
                {{--								<ul class="iconlist m-0 pr-5">--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/uk.png') }}" alt="Country Flag"><a href="#">United Kingdom</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/us.png') }}" alt="Country Flag"><a href="#">USA</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/br.png') }}" alt="Country Flag"><a href="#">Brazil</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/sa.png') }}" alt="Country Flag"><a href="#">South Africa</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/in.png') }}" alt="Country Flag"><a href="#">India</a></li>--}}
                {{--								</ul>--}}
                {{--								<ul class="iconlist m-0 pl-5">--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/si.png') }}" alt="Country Flag"><a href="#">Singapore</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/ja.png') }}" alt="Country Flag"><a href="#">Japan</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/au.png') }}" alt="Country Flag"><a href="#">Australia</a></li>--}}
                {{--									<li><img src="{{ asset('front/movers/images/flags/ca.png') }}" alt="Country Flag"><a href="#">Canada</a></li>--}}
                {{--									<li><a href="#" class="text-black-50">See all..</a></li>--}}
                {{--								</ul>--}}
                {{--							</div>--}}
                {{--						</div>--}}
                {{--					</div>--}}

                {{--					<div class="counter-section">--}}
                {{--						<div class="row align-items-stretch m-0 w-100 clearfix">--}}

                {{--							<div class="col-sm-3 col-6 center">--}}
                {{--								<div class="counter-dots"></div>--}}
                {{--								<div class="counter font-secondary"><span data-from="100" data-to="11000" data-refresh-interval="50" data-speed="2100" data-comma="true"></span>+</div>--}}
                {{--								<h5 class="text-capitalize ls0 mt-0"><u>Moved Monthly</u></h5>--}}
                {{--							</div>--}}

                {{--							<div class="col-sm-3 col-6 center">--}}
                {{--								<div class="counter-dots"></div>--}}
                {{--								<div class="counter font-secondary"><span data-from="3" data-to="26" data-refresh-interval="50" data-speed="2200" data-comma="true"></span>+</div>--}}
                {{--								<h5 class="text-capitalize ls0 mt-0"><u>Years of Experience</u></h5>--}}
                {{--							</div>--}}

                {{--							<div class="col-sm-3 col-6 center">--}}
                {{--								<div class="counter-dots"></div>--}}
                {{--								<div class="counter font-secondary"><span data-from="100" data-to="6000" data-refresh-interval="25" data-speed="2300" data-comma="true"></span>+</div>--}}
                {{--								<h5 class="text-capitalize ls0 mt-0"><u>Trained Manpower</u></h5>--}}
                {{--							</div>--}}

                {{--							<div class="col-sm-3 col-6 center">--}}
                {{--								<div class="counter-dots"></div>--}}
                {{--								<div class="counter font-secondary"><span data-from="1" data-to="21" data-refresh-interval="10" data-speed="2100" data-comma="true"></span>+</div>--}}
                {{--								<h5 class="text-capitalize ls0 mt-0"><u>Countries Worldwide</u></h5>--}}
                {{--							</div>--}}

                {{--						</div>--}}
                {{--					</div>--}}
                {{--				</div>--}}
                {{--				<div class="clear"></div>--}}

                <div class="container mb-5">
                    <div class="section-clients mx-auto" style="max-width: 700px">
                        <div class="center clearfix mb-4">
                            <span class="badge badge-pill lightthemecolor color text-uppercase ls1 font-weight-medium py-2 px-3">We’ve valuable Organizations Since 2021</span>
                        </div>
                        <div class="clear"></div>

                        <div class="toggle mt-5" data-state="open">
                            <div class="toggle-header flex-row-reverse">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-line-circle-plus"></i>
                                    <i class="toggle-open icon-line-circle-cross"></i>
                                </div>
                                <div class="toggle-title font-weight-medium">
                                    Why choose us for in and out shifting?
                                </div>
                            </div>
                            <div class="toggle-content text-black-50">
                                We trust it is critical to give an expert gracious and classified top-notch administration to every one of our customers, it is thus that numerous customers allude us to their associates and companions. We accept we offer elite assistance at the most serious expenses worldwide with no hidden charges.
                            </div>
                        </div>

                        <div class="toggle">
                            <div class="toggle-header flex-row-reverse">
                                <div class="toggle-icon">
                                    <i class="toggle-closed icon-line-circle-plus"></i>
                                    <i class="toggle-open icon-line-circle-cross"></i>
                                </div>
                                <div class="toggle-title font-weight-medium">
                                    Advanced Moving Equipments
                                </div>
                            </div>
                            <div class="toggle-content text-black-50">
                                DN courier move your shipments by using advanced techniques.We use best tracking equipment, give you 24/7 tracking of your shipments.We use modern moving technique to move your shipments with safety and privacy.
                            </div>
                        </div>

                    </div>
                </div>



        {{--			<div class="clear"></div>--}}

        {{--                <div class="container">--}}
        {{--                    <h3 class="center"> What Our Users Say:</h3>--}}
        {{--                    <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget" data-margin="20" data-items-sm="1" data-items-md="2" data-items-xl="3">--}}

        {{--                        <div class="oc-item">--}}
        {{--                            <div class="testimonial">--}}
        {{--                                <div class="testi-image">--}}
        {{--                                    <a href="#"><img src="{{ asset('front/images/testimonials/1.jpg') }}" alt="Customer Testimonails"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="testi-content">--}}
        {{--                                    <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>--}}
        {{--                                    <div class="testi-meta">--}}
        {{--                                        John Doe--}}
        {{--                                        <span>XYZ Inc.</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="oc-item">--}}
        {{--                            <div class="testimonial">--}}
        {{--                                <div class="testi-image">--}}
        {{--                                    <a href="#"><img src="{{ asset('front/images/testimonials/2.jpg') }}" alt="Customer Testimonails"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="testi-content">--}}
        {{--                                    <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>--}}
        {{--                                    <div class="testi-meta">--}}
        {{--                                        Collis Ta'eed--}}
        {{--                                        <span>Envato Inc.</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="oc-item">--}}
        {{--                            <div class="testimonial">--}}
        {{--                                <div class="testi-image">--}}
        {{--                                    <a href="#"><img src="{{ asset('front/images/testimonials/7.jpg') }}" alt="Customer Testimonails"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="testi-content">--}}
        {{--                                    <p>Fugit officia dolor sed harum excepturi ex iusto magnam asperiores molestiae qui natus obcaecati facere sint amet.</p>--}}
        {{--                                    <div class="testi-meta">--}}
        {{--                                        Mary Jane--}}
        {{--                                        <span>Google Inc.</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="oc-item">--}}
        {{--                            <div class="testimonial">--}}
        {{--                                <div class="testi-image">--}}
        {{--                                    <a href="#"><img src="{{ asset('front/images/testimonials/3.jpg') }}" alt="Customer Testimonails"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="testi-content">--}}
        {{--                                    <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>--}}
        {{--                                    <div class="testi-meta">--}}
        {{--                                        Steve Jobs--}}
        {{--                                        <span>Apple Inc.</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="oc-item">--}}
        {{--                            <div class="testimonial">--}}
        {{--                                <div class="testi-image">--}}
        {{--                                    <a href="#"><img src="{{ asset('front/images/testimonials/4.jpg') }}" alt="Customer Testimonails"></a>--}}
        {{--                                </div>--}}
        {{--                                <div class="testi-content">--}}
        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, perspiciatis illum totam dolore deleniti labore.</p>--}}
        {{--                                    <div class="testi-meta">--}}
        {{--                                        Jamie Morrison--}}
        {{--                                        <span>Adobe Inc.</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                    </div>--}}

        {{--                </div>--}}

        {{--            </div>--}}
    </section><!-- #content end -->
@endsection

