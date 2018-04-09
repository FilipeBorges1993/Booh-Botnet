<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color:white;"><b>×</b></span><span class="sr-only">Close</span></button>
    <img class="col-centered" src="{{ URL::asset('img/Nova_Logo.png') }}" style="width: 71px; display: block">
</div>

<div class="modal-body">

    <div class="loading" style="display: none">
        <img class="col-centered" src="{{ URL::asset('img/loading.gif') }}" style="width: 200px; margin-top: 30px;margin-bottom: 40px; display:block">
    </div>

    <div class="contentModal" >
        <form class="materialInputs">

            <div class="md-form" style="margin-top: 25px">
                <select class="search-select" data-input="action"  style=" color: #ffffff">
                    <option value="1">1xPanel Credentials (Shared Server) + 1xBuild + 1xCrypt </option>
                    <option value="2">1xPanel Credentials (Private Server) + 1xBuild + 1xCrypt</option>
                    <option value="3">1xCrypt(ReFud)</option>
                    <option value="4">Private Stub</option>

                    <option value="5">1000 Zomb´s</option>
                    <option value="6">2000 Zomb´s</option>
                    <option value="7">5000 Zomb´s</option>
                </select>
                <label for="form1" class="" style="margin-top: -20px;font-size: 58%;color: #f3f3f3;">Service</label>
            </div>
            <div class="md-form " >
                <input type="text" id="email" class="form-control" data-input="email" style="color: #6f61f1">
                <label for="email" class="labelData" style="color: #f3f3f3;">Email</label>
            </div>
            <div class="md-form">
                <input type="text" id="discord" class="form-control" data-input="discord" style="color: #6f61f1">
                <label for="discord" class="labelData" style="color: #f3f3f3;">Discord</label>
            </div>
            <div class="md-form">
                <textarea type="text" id="form76" class="md-textarea" style="color: #6f61f1"></textarea>
                <label for="form76" style="color: #f3f3f3;">Extra Information</label>
            </div>
            <div style="margin-bottom: 10px"></div>
            <div style="width: 100%; text-align: center; border-bottom: 1px dashed rgba(255, 255, 255, 0.36); height: 50px">
                <p style="font-weight: bold;font-size: 90%;margin-top: 15px;color: #ffffff; float: left">Price:</p>
                <p class="priceClass" style="font-size: 90%; font-weight: bold; color: #56e486;float: right;margin-top: 14px"></p>
            </div>
            <div class="form-group" style="margin-top: 20px; margin-bottom: -10px">
                <!-- Button -->
                <div class="controls col-centered">
                    <button id="submitNew" type="button" href="#" class="btn btn-primary-1 col-centered" style="display: block; width:100%;margin-top: 25px;margin-left: 0px;">Pay</button>
                </div>
            </div>

        </form>
    </div>

</div>

<script>


    $('.search-select').on('change', function(){
        setPrice($(this).val());
    });
    //Set the price
    function setPrice(val){
        let price = 0;
        switch (val){

            case '1':
                price = "25$"
                break;

            case '2':
                price = "100$"
                break;

            case '3':
                price = "7$"
                break;

            case '4':
                price = "150$"
                break;

            case '5':
                price = "100$"
                break;

            case '6':
                price = "180$"
                break;

            case '7':
                price = "400$"
                break;
        }
        $('.priceClass').html(price);
    }
    //Int function
    setPrice($('.search-select').val());
    //Loading make
    function switchDivs(type){
        if(type == 1){
            $('.loading').css('display', 'none');
            $('.contentModal').css('display', 'block');
        }else{
            $('.loading').css('display', 'block');
            $('.contentModal').css('display', 'none');
        }
    }
    //Trigger function on click btn
    $('#submitNew').on('click', function(){
        switchDivs(0);

        let data = {'menu':$('.search-select').val(),'email':$('#email').val(), 'discord':$('#discord').val(),'msgText':$('#form76').val()};
        //Get Main Containers
        $.post(ajaxURL,{dataRequest: 'shopSendBuyRequest',data:data})
                .done(function(data){

                    if(data['error'] == 1){
                        switchDivs(1);
                        validateData(data['msgs'])
                    }
                    else{
                        //Print the html on modal -> clean this html!
                        switchDivs(1);
                        $('.contentModal').html(data['html']);
                    }

                })
    });
    //Validate
    function validateData(data){
        //Trigger Notification
        toastr.error('Check the inputs Please', 'Fail!')
    };

</script>









