@extends('Panel.Master.Master')

@section('content')

    <div class="col-md-12 col-centered" style="max-height: 500px">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 40px;color: #b3b3b3; background-color: rgba(0, 0, 0, 0.79); border-color: #c5c5c5; text-align: center">

                <p style="color: white;font-weight: bold">Connections</p>


            </div>
            <div class="panel-body " style="  overflow: scroll; direction:rtl;max-height: 500px">

                <div class="row-in-panel header">
                    <div class="table-row" style="width: 5%; border-left: 1px solid white">
                        <p>Id</p>
                    </div>
                    <div class="table-row" style="width: 15%; border-left: 1px solid white">
                        <p>Country</p>
                    </div>
                    <div class="table-row" style="width: 15%">
                        <p>Bot ip</p>
                    </div>
                    <div class="table-row" style="width: 45%">
                        <p>Last command</p>
                    </div>
                    <div class="table-row" style="width: 20%">
                        <p>Time</p>
                    </div>

                </div>

                <!--Loop-->
                <div class="ConnectionsDom"></div>

            </div>
        </div>
    </div>

@endsection


@section('Script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>
    <script>

        var take = 20;
        function reCall_(data){

            function popConnections(array){
                $('.ConnectionsDom').empty();

                array['data'].forEach(function (el){
                    let html = '<div class="row-in-panel line">' +
                            '<div class="table-row" style="width: 5%; border-left: 1px solid white">' +
                            '<p>'+el['bot_id']+'</p>' +
                            ' </div>' +
                            '<div class="table-row" style="width: 15%">' +
                            '<p>'+el['bot_country']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 15%">' +
                            '<p>'+el['bot_ip']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 45%">' +
                            '<p>'+el['bot_command']+'</p>' +
                            '</div>' +
                            '<div class="table-row" style="width: 20%">' +
                            ' <p>'+el['time_ago']+'</p>' +
                            ' </div>' +
                            '</div>';

                    $('.ConnectionsDom').append(html);
                });

                //Set seeMor btn
                if(array['seeMore'] == 1){
                    let seeMore = '<div class="controls col-centered" style="margin-top: 15px">' +
                            '<button id="seeMore" type="button" href="#" class="btn btn-primary col-centered waves-effect waves-light" style="display: block; width:100%;border: 1px solid #ffffff6e;float: none; margin: 0 auto ;background-color: #3a3a3a;">See More</button>'+
                            '</div>';
                    $('.ConnectionsDom').append(seeMore);
                }
            };

            popConnections(data)

        };
        function refreshFunction(){
            ajax({dataRequest: 'connectionsMain',take:take});
        };

        //SeeMore trigger
        $(document).on('click', '#seeMore', function(){
            take = take + 10;
            refreshFunction();
        });

        refreshFunction();
        setInterval(refreshFunction,10000);

    </script>

@endsection

@section('css')
    <style>

        /** DataTable
        **/
        .row-in-panel-less p{
            font-size: 75%;
            margin-top: 5px;
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
        .dataJsonTitle{
            color:#6e63e8
        }
        .dataJsonLight{
            font-size: 90%;
            font-weight: lighter;
        }
        .stopBtn{
            width: 65px;
            height: 15px;
            border: 1px solid white;
            margin-top: 3px;
            border-radius: 5px;
        }
        .stopBtn p{
            font-weight: bold;
            font-size: 70%;
        }

    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/selectBoxLib.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" rel="stylesheet">
@endsection