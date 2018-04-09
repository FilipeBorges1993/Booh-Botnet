@extends('Panel.Master.Master')

@section('content')

    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading" style="color: #b3b3b3; background-color: rgba(0, 0, 0, 0.83); border-color: #c5c5c5;">
                <img class="col-centered" src="{{ URL::asset('img/252133.svg') }}" style="display:block;width: 37px;">
            </div>
            <div class="panel-body " style=" overflow: scroll; direction:ltr;max-height: 500px">

                <div class="row-in-panel header">

                    <div class="table-row" style="width: 5%; border-left: 1px solid white">
                        <p>Id</p>
                    </div>
                    <div class="table-row" style="width: 25%; ">
                        <p>BotKey</p>
                    </div>
                    <div class="table-row" style="width: 15%; border-left: 1px solid white">
                        <p>Ip</p>
                    </div>
                    <div class="table-row" style="width: 15%">
                        <p>Country</p>
                    </div>
                    <div class="table-row" style="width: 10%">
                        <p>Installed</p>
                    </div>
                    <div class="table-row" style="width: 15%">
                        <p>OS</p>
                    </div>
                    <div class="table-row" style="width: 5%">
                        <p>V</p>
                    </div>
                    <div class="table-row" style="width: 10%">
                        <p>Status</p>
                    </div>

                </div>

                <!--Loop-->
                <div class="infBots"></div>

            </div>
        </div>

    </div>

@endsection


@section('Script')
    <script>
        var take = 20;
        function reCall_(data){

            function popBots(array){

                $('.infBots').empty();

                array['data'].forEach(function (el){
                    let html = '<div class="row-in-panel line">' +
                            '<div class="table-row" style="width: 5%; border-left: 1px solid white">' +
                            '<p>'+el['id']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 25%; font-size: 90%">' +
                            '<p>'+el['botKey']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 15%;">' +
                            '<p>'+el['ip']+'</p>' +
                            ' </div>' +
                            '<div class="table-row" style="width: 15%">' +
                            '<p>'+el['country']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 10%">' +
                            ' <p>'+el['time_ago']+'</p>' +
                            ' </div>' +
                            '<div class="table-row" style="width: 15%">' +
                            '<p>'+el['os']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 5%">' +
                            '<p>'+el['v']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 10%">' +
                            '<p style="font-size: 80%; margin-top: 4px">' +
                            el['status'] +
                            '</p>' +
                            '</div>' +
                            '</div>';
                    $('.infBots').append(html);
                });

                if(array['seeMore'] == 1){
                    let seeMore = '<div class="controls col-centered" style="margin-top: 15px">' +
                            '<button id="seeMore" type="button" href="#" class="btn btn-primary col-centered waves-effect waves-light" style="display: block; width:100%;border: 1px solid #ffffff6e;float: none; margin: 0 auto ;background-color: #3a3a3a;">See More</button>'+
                            '</div>';
                    $('.infBots').append(seeMore);
                }

            };

            popBots(data);

        }
        function refreshFunction(){
            ajax({dataRequest: 'botsMain',take:take});
        }

        ajax({dataRequest: 'botsMain',take:take});
        setInterval(refreshFunction,60000);
    </script>
@endsection

@section('css')
    <style>
        .row-in-panel-less.header{
            width: 100%;
            height: 23px;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        .row-in-panel-less.line{
            width: 100%;
            height: 23px;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        .row-in-panel-less p{
            font-size: 75%;
            margin-top: 5px;
        }
        .info-row{
            float: left;
            text-align: center;
            border-right: 1px solid white;
            height: 100%;
        }
        .info-row p{
            color: #ffffff;
        }

        .row-in-panel.header{
            width: 100%;
            height: 23px;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        .row-in-panel.header .table-row{
            float: left;
            text-align: center;
            border-right: 1px solid white;
            height: 100%;
        }
        .row-in-panel{
            width: 100%;
            height: 23px;
            border-bottom: 1px solid white;
        }
        .row-in-panel .table-row{
            float: left;
            text-align: center;
            border-right: 1px solid white;
            height: 100%;
        }
        .table-row p{
            color: #ffffff;
        }
        .row-in-panel.line .table-row p{
            font-size: 75%;
            margin-top:5px;

        }

        .info-in-panel{
            float: right;
            width: 45px;
            text-align: center;
        }
        .info-in-panel p{
            color: white;
            font-size: 110%;
        }
        .svg-in-panel{
            text-align: center;
            width: 50px;
            float: left;
        }
        .svg-in-panel img{
            margin-top: -20px;
            z-index: 999999
        }
        .svg-in-panel p{
            color: white;
        }
        .panel-body.cards{
            height: 80px;
        }
    </style>
@endsection