@extends('frontend.layouts.template')

	@section('content')

@php $root = env('ROOT_FOLDER'); @endphp
				<!-- Including header -->
			@include('frontend.pages.includes.header')


		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-mini">

			<div class="container clearfix">
				<h1>Book and Appointment</h1>
				<span></span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active text-white" aria-current="page">Book an Appointment</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				@include('frontend.pages.calender')
			</div>
		</section><!-- #content end -->


@push('custom-scripts')
	<script src="{{ asset($root.'front/js/plugins.animations.js' )}}"></script>
@endpush

@endsection
