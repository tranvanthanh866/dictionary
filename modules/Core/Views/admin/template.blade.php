@extends("Core::template")

@section('title', 'CMS VNIT')
@section('class-body', 'hold-transition sidebar-mini') {{-- skin-yellow-light --}}

@section("head")
    <link rel="shortcut icon" type="image/png" href="{{asset('vendor/AdminLTE2/img/favicon.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/admin/css/app.css?v=1.0.0">
    <title>@yield('title')</title>
@endsection

@section("header")
	<div class="wrapper">
    @include('Core::admin.layout.header')
    @include('Core::admin.layout.menu-sidebar')
@endsection

@section("content")
   @include('Core::admin.layout.content')
@endsection

@section("footer")
    @include('Core::admin.layout.footer')
	</div>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="/vendor/AdminLTE3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/AdminLTE3/dist/js/adminlte.min.js"></script>

    <script src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript">
        var url = window.location;
        let domain = "{{url('/')}}";
        let loader = $('#js-loading');
    </script>
    <script src="/admin/js/app.js"></script>

@endsection
