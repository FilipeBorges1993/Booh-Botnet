@extends('Panel.Master.Master')

@section('content')


        <div class="col-md-12 " style="">
         <div class="panel panel-default" style="margin-bottom: 110px">
             <div class="panel-body " style="text-align: center;">

                 <p class="textInfo-1" style="margin-top: 10px">
                     <b style="color: #7567f2; font-size: 130%;">SetUps:</b>
                 </p>
                 <p class="mainText_1" style="margin-top: 10px;">
                     1xPanel Credentials <b style="color: #52db80">(Shared Server)</b> + 1xBuild + 1xCrypt
                 </p>
                 <p class="rightText1" style=" margin-bottom: -5px;"><b>25$</b></p>
                 <div style="width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.54);margin-top: 46px;"></div>
                 <p class="mainText_1" style="margin-top: 7px;">
                     1xPanel Credentials<b style="color: #52db80"> (Private Server)</b> + 1xBuild + 1xCrypt
                 </p>
                 <p class="rightText1" ><b>100$</b></p>


                 <p class="textInfo-1" style=" margin-top: 60px; margin-bottom: -14px;">
                     <b style="color: #7567f2;font-size: 130%">ReFud:</b>
                 </p>
                 <br>
                 <p class="mainText_1" style="margin-top: 7px;">
                     1xCrypt(ReFud)
                 </p>
                 <p class="rightText1" ><b>7$</b></p>
                 <div style="width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.54);margin-top: 36px;"></div>
                 <p class="mainText_1" style="margin-top: 7px; ">
                     Private Stub
                 </p>
                 <p class="rightText1"><b>150$</b></p>

                 <br>

                 <p class="textInfo-1" style="margin-top: 35px;">
                     <b style="color: #7567f2">Bots: <b style="color: white; font-size: 80%">(Currently not available)</b></b>
                 </p>
                 <p class="mainText_1" style="margin-top: 10px;">
                     1000 Zomb´s
                 </p>
                 <p class="rightText1" style=" margin-bottom: -5px;"><b>100$</b></p>
                 <div style="width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.54);margin-top: 46px;"></div>
                 <p class="mainText_1" style="margin-top: 7px;">
                     2000 Zomb´s
                 </p>
                 <p class="rightText1" ><b>180$</b></p>
                 <div style="width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.54);margin-top: 36px;"></div>
                 <p class="mainText_1" style="margin-top: 7px;">
                     5000 Zomb´s
                 </p>
                 <p class="rightText1" ><b>400$</b></p>

                 <br>

                 <div style="width: 100%;">

                     <div class="col-centered" style="">
                         <button  type="button" href="#" class="btn btn-primary-1 col-centered trigger-modal" data-id="1" style="margin-top: 32px;;display: block;margin-left: 0px; ">Buy</button>
                     </div>

                 </div>

             </div>
         </div>
     </div>

     <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content" style="border: 1px solid #737373;  background-color: rgba(0, 0, 0, 0.84); box-shadow: 0px 0px 5px 3px;">

         </div>
     </div>
 </div>

@endsection

@section('Script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>
    <script>
        var srcScript = '{{ URL::asset('js/libs/selectBoxLib.js') }}';
        $('.trigger-modal').on('click', function(){
            //Todo-> set up ajax call to get the modal content
            ajax({dataRequest: 'shopGetModal',modal:$(this).data('id')});
            $('#Modal').modal();
        });

        function reCall_(data){
            //Todo->populate modal
            $('.modal-content').html(data);
            $.getScript(srcScript, function() {


            });
        };

    </script>
@endsection

@section('css')
    <style>
        .btn-primary-1 {
            border: 1px solid #ffffff6e;
            float: none;
            margin: 0 auto ;
            background-color: #3a3a3a;
            width:100%;

        }
        .btn-primary-1:focus {
            background-color: rgba(58, 255, 130, 0.36);
        }
        .rightText1{
            float: right;
            margin-top: 7px;
            font-size: 90%;
        }
        .rightText1 b{
            color: #56e486;
        }
        .mainText_1{
            color: white;
            font-size: 80%;
            float: left;
        }
        .textInfo-1{
            color: white;
            font-size: 80%;
            margin-top: 20px
        }
        .btn:hover, .btn:focus{
            border-color: #000000;
        }
        .rotate_element{
            -webkit-transform: rotate(30deg);
            -moz-transform: rotate(30deg);
            -o-transform: rotate(30deg);
            -ms-transform: rotate(30deg);
            transform: rotate(30deg);
            height: 46px;
            margin-top: -2px;
            position: absolute;
            border-left: 1px solid white;
        }
        .textOnRotate{
            -webkit-transform: rotate(-59deg);
            -moz-transform: rotate(-59deg);
            -o-transform: rotate(-59deg);
            -ms-transform: rotate(-59deg);
            transform: rotate(-59deg);
            color: #60ff98;
            position: absolute;
            font-size: 72%;
            font-weight: bold;
            margin-top: 14px;
            margin-left: -4px;
        }
    </style>
    <link rel="stylesheet" href="{{ URL::asset('css/selectBoxLib.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" rel="stylesheet">
@endsection