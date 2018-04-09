<html>
<head>
    <link rel="icon" href="{{ URL::asset('img/hacker.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BootNet@</title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.rawgit.com/FezVrasta/bootstrap-material-design/dist/dist/bootstrap-material-design.min.css">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .svg-icon {
            width: 36px;
            height: 19px;
        }
        .svg-icon path,
        .svg-icon polygon,
        .svg-icon.header rect {
            fill: #4691f6;
        }
        .svg-icon.header circle {
            stroke: #4691f6;
            stroke-width: 1;
        }
        body {
            background-color: rgba(0, 0, 0, 0.89);
        }
    </style>

    @yield('css')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/libs/particles.js') }}"></script>
    <script src="https://cdn.rawgit.com/HubSpot/tether/v1.3.4/dist/js/tether.min.js"></script>
    <script src="https://cdn.rawgit.com/FezVrasta/bootstrap-material-design/dist/dist/bootstrap-material-design.iife.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('body').bootstrapMaterialDesign();
    </script>

</head>

<body style="">

@include('Panel.Master.Header')
@include('Panel.Master.Nav')

<div class="container" style="padding-left: 54px;">
    <div style="margin-top: 45px">
    @yield('content')
    </div>
</div>

<div id="particles" style="position: absolute;z-index: -1;width: 100%;height: 100%"></div>

<footer class="footer" style="position: absolute; bottom: 5px;    right: 5px; display: none">
    <div class="container" style="float: right">
        <span class="text-muted pull-right" style="font-size: 70%; color: white">@By Dorids</span>
    </div>
</footer>

</body>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var ajaxURL = '{{ route('ajax') }}';
    function ajax(array){

        //Get Main Containers
        $.post(ajaxURL,array)
                .done(function(data){
                    reCall_(data);
                })


    }
    function setLoading(boolean){
        if(boolean){

        }
    }
</script>
@yield('Script')

</html>