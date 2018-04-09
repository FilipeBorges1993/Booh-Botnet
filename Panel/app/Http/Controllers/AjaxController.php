<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Get ajax Request
     *
     * @param $request;
     *
     * @return array
     */

    public function getAjax(Request $request){
        $dataResponse = '';
        $dataRequest = $request['dataRequest'];

        //Define the function to display Html

        switch ($dataRequest){

            case 'boardMain':
                $dataResponse = app('App\Http\Controllers\BoardController')->boardMainData($request);
                break;
            case 'botsMain':
                $dataResponse = app('App\Http\Controllers\BotsController')->mainConstructor($request);
                break;
            case 'ordersMain':
                $dataResponse = app('App\Http\Controllers\OrdersController')->OrderConstructor($request);
                break;
            case 'createOrder':

                $dataResponse = app('App\Http\Controllers\OrdersController')->createOrder($request);
                break;

            case 'orderStop':

                $dataResponse = app('App\Http\Controllers\OrdersController')->stopOrder($request);
                break;

            case 'connectionsMain':
                $dataResponse = app('App\Http\Controllers\ConnectionsController')->mainConstructor($request);
                break;
            case 'userMain':
                $dataResponse =  app('App\Http\Controllers\AccountsController')->mainConstructor($request);
                break;
            case 'userStatus':
                $dataResponse = app('App\Http\Controllers\AccountsController')->userStatusMaker($request);
                break;
            case 'shopGetModal':
                $dataResponse = app('App\Http\Controllers\ShopController')->getModal($request);
                break;
            case 'shopSendBuyRequest':
                $dataResponse = app('App\Http\Controllers\ShopController')->sendBuyRequest($request);
                break;
            case 'shopSendBuyCompletion':
                $dataResponse = app('App\Http\Controllers\ShopController')->sendBuyCompletion($request);
                break;

        }

        return $dataResponse;

    }

}
