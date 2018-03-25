<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/ui/assets/images/favicon.png') }}">
    <title>Sistem Informasi Penelitian dan Pengabdian Masyarakat</title>
    <link href="{{ asset('/ui/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/ui/lite version/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/ui/lite version/css/colors/blue.css') }}" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>

<div id="main-wrapper">

@include('users.main.header')

@include('users.main.sidebar')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">@yield('title')</h3>
                </div>
            </div>

            @yield('content')

        </div>

    @include('users.main.footer')

    </div>

</div>

<script src="{{ asset('/ui/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/ui/lite version/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/ui/lite version/js/waves.js') }}"></script>
<script src="{{ asset('/ui/lite version/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('/ui/lite version/js/custom.min.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}/"></script>
<script src="{{ asset('/ui/lite version/js/flot-data.js') }}"></script>
<script src="{{ asset('/ui/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".dropdown-toggle").dropdown();
    });
</script>

<script type="text/javascript" src="{{asset('/js/custom.js')}} "></script>
</body>

</html>
