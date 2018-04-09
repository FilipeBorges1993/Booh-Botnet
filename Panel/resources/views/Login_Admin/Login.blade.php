<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BootNet@</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #171717;
        }
        #loginbox {
            margin-top: 30px;
        }
        #loginbox > div:first-child {
            padding-bottom: 10px;
        }
        .iconmelon {
            display: block;
            margin: auto;
        }
        #form > div {
            margin-bottom: 25px;
        }
        #form > div:last-child {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .panel {
            background-color: transparent;
        }
        .panel-body {
            padding-top: 30px;
            background-color: rgba(0, 0, 0, 0.3);
        }
        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            z-index: -2;
        }
        .iconmelon,
        .im {
            position: relative;
            width: 150px;
            height: 150px;
            display: block;
            fill: #525151;
        }
        .iconmelon:after,
        .im:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .col-centered {
            float: none;
            margin: 0 auto;
        }
    </style>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/libs/particles.js') }}"></script>


</head>
<body style="">

<div class="container">



    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

        <div class="row">
            <div class="iconmelon">
                <img src="{{ URL::asset('img/hacker.png') }}" style="width: 97px; margin-left: 25px; margin-top: 25px;z-index: 999999">
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" style="color: #b3b3b3; background-color: #333333; border-color: #c5c5c5;">
                <div class="panel-title text-center">Booh!@</div>
            </div>

            <div class="panel-body">

                <form action="{{ route('loginSubmit') }}" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                    @if($errors->any())
                            @foreach($errors->all() as $error)
                                <li style="color: #ffffff;  margin-top: -15px; margin-bottom: 7px;    font-size: 70%;">
                                    {{ $error }}
                                </li>
                            @endforeach
                    @endif


                        <div class="md-form " >
                            <input id="user" type="text" class="form-control" name="username" value="" placeholder="User" required>
                        </div>

                    <div class="md-form">
                        <input id="password" type="password" class="form-control" name="password"  placeholder="Password">
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::Token() }}">
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls col-centered">
                            <button type="submit" href="#" class="btn btn-primary col-centered"
                                    style="display: block;    width: 100%;    background-color: #3a3a3a;">Login
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>


<div id="particles" style="position: absolute;z-index: -1;width: 100%;height: 100%"></div>

<footer class="footer" style="position: absolute; bottom: 5px;    right: 5px;">
    <div class="container" style="float: right">
        <span class="text-muted pull-right" style="font-size: 70%; color: white">@By Dorid</span>
    </div>
</footer>
</body>

</html>

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>

<style>

    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 30px rgba(0, 0, 0, 0.18) inset;
        -webkit-text-fill-color: rgba(255, 255, 255, 0.58) !important;
        -webkit-box-fill-color: 0 0 0 30px rgba(0, 0, 0, 0.18) inset;
        -webkit-box-fill-color: 0 0 0 30px rgba(0, 0, 0, 0.18) inset;

    }

    input{

        color: white;

    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        transition: background-color 3000s ease-in-out 0s;
    }


</style>