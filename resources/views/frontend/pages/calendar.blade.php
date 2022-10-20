
@extends('frontend.layouts.template')

@push('custom-css')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css' rel='stylesheet' />
@endpush

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

        <div class="container">
          <div class="row">
              <div class="col-6">
                  <h4> Business  : {{ $company->name }} </h4>
              </div>
              <div class="col-6">
                  <h4> Category  : {{ $company->category->title }} </h4>
              </div>
            <div class="col-md-12">
            
                <div id="calendar"></div>

            </div>
          </div>
      </div>
  
	</div>
</section><!-- #content end -->


@include('frontend.pages.includes.booking-modal')

@endsection

@push('custom-scripts')
<script src="{{ asset($root.'front/js/plugins.animations.js' )}}"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js'></script>
<script>

  $(document).ready( function() {
    jQuery('#from_time, #to_time').datepicker({
			autoclose: true,
			startDate: "today",
      format: 'yyyy-mm-dd'
		});

    let calendarEl = document.getElementById('calendar');
    $.ajax({
        url: "/api/get-appointments/{{ request()->company_id }}",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          let events = [];
          $.each( res, function( key, value ) {
            events.push({
              title: value.title,
              start: value.from_time,
              end: value.to_time,
            })
          });
          let calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: events,
          dateClick: function({dateStr}) {
            $(' #from_time, #to_time').val( dateStr )
            $('#bookAppointmentModal').modal('show');
          },
        });
        calendar.render();

        }
    });
  });

</script>
@endpush
