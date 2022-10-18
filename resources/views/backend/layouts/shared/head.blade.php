
<link rel="shortcut icon" href="{{ URL::asset('admin/assets/images/favicon.ico') }}">

@yield('css')

<!-- App css -->
<link href="{{ URL::asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@if(isset($isDark) && $isDark)
<link href="{{ URL::asset('admin/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ URL::asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    @if(isset($isRTL) && $isRTL)
    <link href="{{ URL::asset('admin/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    @else
    <link href="{{ URL::asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @endif
@endif

<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>