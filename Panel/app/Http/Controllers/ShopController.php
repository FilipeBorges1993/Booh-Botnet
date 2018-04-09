<?php

namespace App\Http\Controllers;

use App\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;


class ShopController extends Controller
{
    /**
     * Return the service['name']['price']
     *
     * @return array
     */
    private static function servicePrice(){
        //Price of services
        $services = array();
        $services[1] = ['price'=>25,'name'=>'1xPanel Credentials (Shared Server) + 1xBuild + 1xCrypt'];
        $services[2] = ['price'=>100,'name'=>'1xPanel Credentials (Private Server) + 1xBuild + 1xCrypt'];
        $services[3] = ['price'=>7,'name'=>'1xCrypt(ReFud)'];
        $services[4] = ['price'=>150,'name'=>'Private Stub'];
        $services[5] = ['price'=>100,'name'=>'1000 Zomb´s'];
        $services[6] = ['price'=>180,'name'=>'2000 Zomb´s'];
        $services[7] = ['price'=>400,'name'=>'5000 Zomb´s'];

        return $services;
    }

    /**
     * Send a buyer modal to select the service
     * @param $data
     *
     * @return array
     */
    public static function getModal($data){
        $requestModal =  $data['modal'];

        if($requestModal === '1'){
            return view('Panel.ShopModal.nova');
        }

        return $requestModal;

    }

    /**
     * Send a buyer modal to pay
     * @param $data
     *
     * @return array
     */
    public static function sendBuyRequest($data){
        $validator = Validator::make($data['data'], [
            'email'     => 'required|email',
            'discord'  => 'required',
            'menu'  => 'required|min:1|max:7'
        ]);
        if($validator->fails()){
          return ['error'=>1,'msgs'=>$validator->messages()];
      }

        $services = ShopController::servicePrice();

        //Request the now value of btc and eth
        $client = new Client(); //GuzzleHttp\Client
        $btcClient = $client->request('GET', 'https://api.coinmarketcap.com/v1/ticker/bitcoin');
        $ethClient = $client->request('GET', 'https://api.coinmarketcap.com/v1/ticker/ethereum');

        $array = array();
        $array['btc'] = $services[$data['data']['menu']]['price'].'$';
        $array['eth'] = $services[$data['data']['menu']]['price'].'$';

        if($btcClient->getStatusCode() === 200){
            //Deal with the json code
            $btc =  $btcClient->getBody();
            $btc = \GuzzleHttp\json_decode($btc, true);
            $btc = $btc[0]['price_usd'];
            //make the value
            $array['btc'] = round($services[$data['data']['menu']]['price']/$btc, 10).' BTC';
        }
        if($ethClient->getStatusCode() === 200){
            //Deal with the json code
            $etc =  $ethClient->getBody();
            $etc = \GuzzleHttp\json_decode($etc, true);
            $etc = $etc[0]['price_usd'];
            //make the value
            $array['eth'] = round($services[$data['data']['menu']]['price']/$etc, 10).' ETH';
        }

        //Create an array with to pass information
        $passInformation = ShopRequest::create(
            [
                'user_id'=>Auth::user()->id,
                'email'=>$data['data']['email'],
                'discord'=>$data['data']['discord'],
                'textInfo'=>$data['data']['msgText'],
                'menu'=>$data['data']['menu'],
                'status'=>0
            ]);

        return ['error'=>0,'resp'=>$array,'html'=>view('Panel.ShopModal.requestPay',['array'=>$array,'id'=>$passInformation->id])->render()];
    }

    /**
     * Finalize the buy
     * @param $data
     *
     * @return array
     */
    public static function sendBuyCompletion($data){
        //Vars
        $transactionID = $data['data']['transactionID'];
        $id = $data['data']['id'];
        //Validate de transaction data
        if($transactionID === '' || strlen($transactionID) < 7){
            //Return Error
            return ['error'=>1, 'msg'=>'Invalid transaction id'];
        }
        //Validate id
        $shopRequest = ShopRequest::where('id', $id)->where('user_id',Auth::user()->id)->first();
        if($shopRequest === null){
            return ['error'=>1, 'msg'=>'Humm Try Later'];
        }
        //Save the new data on th db
        $shopRequest->transactionID = $transactionID;
        $shopRequest->status = 1;
        $shopRequest->update();
        //Create an email instance Laravel
        ShopController::sendEmail([
                'toEmail'=>$shopRequest->email,
                'serviceName'=>ShopController::servicePrice()[$shopRequest->menu]['name'],
                'servicePrice'=>ShopController::servicePrice()[$shopRequest->menu]['price'],
                'discord'=>$shopRequest->discord,
                'textInfo'=>$shopRequest->textInfo,
                'transactionID'=>$shopRequest->transactionID,
            ]);

        return ['error'=>0,'msg'=>'We will contact you in 24 hours Max'];
    }

    /**
     * Send the emails
     * @param $data
     *
     */
    private static function sendEmail($data){

        Mail::send('Panel.Email.buyRequestUser', $data, function($message) use($data){
            $message->to($data['toEmail']);
            $message->subject('Buy Request');
        });

        //TODO-> send for us too


    }

}
