
<form class="materialInputs">
        <div class="md-form" style="text-align: center; margin-top: 25px">
            <p style="color: #3dff73; font-size: 97%; font-weight: bold">Bitcoin</p>
            <p style="color: white;font-size: 80%;">{{$array['btc']}}</p>
            <p style="color: #ff61f9; font-size: 97%; font-weight: bold">18U5wn638sRCrZFKNEa1uCYr26eSZrQ3rr</p>
        </div>
        <div class="md-form" style="text-align: center; margin-top: 25px">
            <p style="color: #3dff73; font-size: 97%; font-weight: bold">Ethereum</p>
            <p style="color: white;font-size: 80%;">{{$array['eth']}}</p>
            <p style="color: #ff61f9; font-size: 97%; font-weight: bold"> 0x1277Fe339f0575Ba16C9fbeE6A93fC3C95E0bF70</p>
        </div>
        <div class="md-form" style="margin-top: 50px; margin-bottom: 45px">
            <input type="text" id="transactionID" class="form-control" data-input="transactionID" style="color: #6f61f1">
            <label for="transactionID" class="labelData" style="color: #f3f3f3;">TransactionID</label>
        </div>
        <div class="form-group" style="margin-top: 20px; margin-bottom: -10px">
            <!-- Button -->
            <div class="controls col-centered">
                <button id="sendBtn" type="button" href="#" class="btn btn-primary-1 col-centered" style="display: block; width:100%;margin-top: 25px;margin-left: 0px;">Send</button>
            </div>
        </div>
    </form>
<input type="hidden" value="{{$id}}" id="hiddenID">

<script>

    $('#sendBtn').on('click', function(){
        switchDivs(0);
        let data = {'id':$('#hiddenID').val(),'transactionID':$('#transactionID').val()};

        //Get Main Containers
        $.post(ajaxURL,{dataRequest: 'shopSendBuyCompletion',data:data})
                .done(function(data){

                    if(data['error'] == 1){
                        switchDivs(1);
                        toastr.error(data['msg'], 'Fail!')
                    }else if(data['error'] == 0){
                        $('#Modal').modal('hide');
                        $('.modal-content').html('');
                        toastr.success(data['msg'], 'Success!')
                    }

                })


    });

</script>